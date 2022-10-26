<?php

namespace App\Http\Controllers;

use App\Http\Requests\DescriptionRequest;
use App\Http\Requests\MainImageRequest;
use App\Http\Requests\MaterialStoreRequest;
use App\Http\Requests\MaterialUpdateRequest;
use App\Http\Requests\PeopleRequest;
use App\Http\Requests\PostNameRequest;
use App\Http\Requests\ProcedureStoreRequest;
use App\Http\Requests\ProcedureUpdateRequest;
use App\Http\Requests\SeasoningStoreRequest;
use App\Http\Requests\SeasoningUpdateRequest;
use App\Http\Requests\TitleRequest;
use App\Material;
use App\Post;
use App\Procedure;
use App\Seasoning;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class PostController extends Controller
{
    public function index()
    {
        $recipes = Post::orderBy('updated_at', 'desc')->paginate(8);
        return view('post.pages.index', compact('recipes'));
    }

    public function popular()
    {
        $recipes = Post::withCount('likes')->orderBy('likes_count', 'desc')->paginate(8);
        return view('post.pages.popular', compact('recipes'));
    }

    public function show($id)
    {
        $carbon = new Carbon();
        // 現在の年月の情報を取得
        $year_month = $carbon->year . '-' . $carbon->month;
        $month = $carbon->month;
        $day = $carbon->day;

        $recipe = Post::find($id)->load('materials', 'seasonings', 'procedures');
        return view('post.pages.show', compact('recipe', 'year_month', 'month', 'day'));
    }

    public function create()
    {
        return view('post.pages.create');
    }

    public function store(PostNameRequest $request, Post $post)
    {
        $post->fill($request->all());
        $post->user_id = $request->user()->id;
        $post->save();
        $postId = $post->id;

        return redirect()->route('post.edit', ['post' => $postId]);
    }

    public function edit($post)
    {
        $post = Post::find($post)->load('materials', 'seasonings', 'procedures');
        return view('post.pages.edit', compact('post'));
    }

    public function destroy($post)
    {
        $post = Post::find($post)->load('procedures');

        /*  if (isset($post->image))
        {
            Storage::disk('s3')->delete($post->image);
        }

        foreach ($post->procedures as $procedure)
        {
            if(isset($procedure->photo))
            {
                Storage::disk('s3')->delete($procedure->photo);
            }
        } */

        $post->delete();
        return redirect()->route('post.index');
    }

    public function titleUpdate(TitleRequest $request, $post)
    {
        $post = Post::find($post);
        $post->title = $request->title;
        $post->save();
        return redirect()->route('post.edit', ['post' => $post->id])->with('completion-of-registration-description', '登録が完了しました');
    }

    public function mainImageUpdate(MainImageRequest $request, $post)
    {
        $post = Post::find($post);

        if (isset($post->image)) {
            Storage::disk('s3')->delete($post->image);
        }

        $image = $request->file('file');
        $path = Storage::disk('s3')->putFile('/', $image, 'public');


        $post->image = $path;
        $post->save();
        return redirect()->route('post.edit', ['post' => $post->id])->with('completion-of-registration-main-image', '登録が完了しました');
    }


    public function descriptionUpdate(DescriptionRequest $request, $post)
    {
        $post = Post::find($post);
        $post->description = $request->description;
        $post->save();

        return redirect()->route('post.edit', ['post' => $post->id])->with('completion-of-registration-description', '登録が完了しました');
    }

    public function materialShow($post)
    {
        $post = Post::find($post)->load('materials', 'seasonings');

        return view('post.pages.material.edit', compact('post'));
    }

    public function materialStore(MaterialStoreRequest $request)
    {
        Material::create([
            'post_id' => $request->store_postId,
            'name' => $request->store_material,
            'quantity' => $request->store_material_quantity,
        ]);


        return redirect()->route('post.material.show', ['post' => $request->store_postId])->with('completion-of-registration-material', '登録が完了しました。');
    }

    public function  materialUpdate(MaterialUpdateRequest $request, Material $material)
    {

        Material::where('post_id', $request->edit_postId)->delete();
        $materials = $request->materials;
        if (!empty($materials)) {
            foreach ($materials as $material) {
                Material::create([
                    'post_id' => $request->edit_postId,
                    'name' => $material['materialName'],
                    'quantity' => $material['quantity'],
                ]);
            }
        }
        return redirect()->route('post.material.show', ['post' => $request->edit_postId])->with('completion-of-registration-material', '更新が完了しました。');
    }

    public function seasoningStore(SeasoningStoreRequest $request)
    {
        Seasoning::create([
            'post_id' => $request->store_postId,
            'name' => $request->store_seasoning,
            'quantity' => $request->store_seasoning_quantity,
        ]);


        return redirect()->route('post.material.show', ['post' => $request->store_postId])->with('completion-of-registration-material', '登録が完了しました。');
    }

    public function seasoningUpdate(SeasoningUpdateRequest $request)
    {
        Seasoning::where('post_id', $request->edit_postId)->delete();
        $seasonings = $request->seasonings;
        if (!empty($seasonings)) {
            foreach ($seasonings as $seasoning) {
                Seasoning::create([
                    'post_id' => $request->edit_postId,
                    'name' => $seasoning['seasoningName'],
                    'quantity' => $seasoning['quantity'],
                ]);
            }
        }
        return redirect()->route('post.material.show', ['post' => $request->edit_postId])->with('completion-of-registration-seasoning', '更新が完了しました。');
    }

    public function peopleStore(PeopleRequest $request)
    {

        $postRecipe =  Post::where('id', $request->post_id)->where('user_id', $request->user)->first();

        $postRecipe->people = $request->people;
        $postRecipe->save();
        return redirect()->route('post.material.show', ['post' => $request->post_id])->with('completion-of-registration-people', '登録が完了しました');
    }

    public function procedureShow(Post $post)
    {
        $post->load('procedures');
        /* $postId = $post;
        $procedures = Procedure::where('post_id', $post)->get();
        $path = asset('storage/'); */
        return view('post.pages.procedure.edit', compact(/* 'postId', 'procedures', 'path' */'post'));
    }


    /**
     *
     * 手順の登録
     * @param ProcedureStoreRequest $request
     */
    public function procedureStore(Request $request)
    {
        // dd($request);
        // $path = $request->file->store('public');
        $image = $request->file('file');
        $path = Storage::disk('s3')->putFile('/', $image, 'public');


        $order = Procedure::where('post_id', $request->postId)->select('order')->get();
        Procedure::create([
            'post_id' => $request->postId,
            'order' => count($order),
            /*  'photo' => basename($path), */
            'photo' => $path,
            /* 'photo' => asset('storage/' . basename($path)), */
            'procedure' => $request->procedure,
        ]);

        return redirect()->route('post.procedure.show', ['post' => $request->postId])->with('completion-of-registration-procedure', '登録が完了しました。');
    }

    public function procedureUpdate(ProcedureUpdateRequest $request)
    {
        $procedure = Procedure::find($request->procedure);
        $path = $procedure->photo;

        if (isset($request->file)) {
            Storage::disk('s3')->delete($procedure->photo);
            $image = $request->update_file('file');
            $path = Storage::disk('s3')->putFile('/', $image, 'public');
        }

        $procedure->photo = $path;
        $procedure->procedure = $request->update_procedure;
        $procedure->save();
        return redirect()->route('post.procedure.show', ['post' => $request->post_id])->with('completion-of-update-procedure', '更新が完了しました。');
    }

    public function procedureDestroy(Request $request)
    {
        $procedure = Procedure::find($request->procedure);
        // Storage::disk('s3')->delete($procedure->photo);
        $procedure->delete();
        return redirect()->route('post.procedure.show', ['post' => $request->post_id])->with('completion-of-destroy-procedure', '削除が完了しました。');
    }

    public function procedureSort(Request $request)
    {
        foreach ($request->procedures as $procedure) {
            $value = Procedure::find($procedure['id']);
            $value->order = $procedure['order'];
            $value->save();
        }
        return redirect()->route('post.procedure.show', ['post' => $request->post_id])->with('completion-of-sort-procedure', '更新が完了しました。');
    }


    /**
     * いいね機能
     */
    public function like(Request $request, Post $post)
    {
        $post->likes()->detach($request->user()->id);
        $post->likes()->attach($request->user()->id);

        return [
            'id' => $post->id,
            'countLikes' => $post->count_likes,
        ];
    }

    public function unlike(Request $request, Post $post)
    {
        $post->likes()->detach($request->user()->id);

        return [
            'id' => $post->id,
            'countLikes' => $post->count_likes,
        ];
    }
}
