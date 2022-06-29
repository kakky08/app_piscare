<?php

namespace App\Http\Controllers;

use App\Material;
use App\Post;
use App\Procedure;
use App\Seasoning;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('post.pages.index');
    }

    public function create()
    {
        return view('post.pages.create');
    }

    public function store(Request $request, Post $post)
    {
        $post->fill($request->all());
        $post->user_id = $request->user()->id;
        $post->save();
        $postId = $post->id;

        return redirect()->route('post.edit', ['post' => $postId]);
    }

    public function edit($post)
    {
        $postId = $post;
        $procedures = Procedure::where('post_id', $post)->orderBy('order', 'desc')->get();
        $materials = Material::where('post_id', $post)->select('name', 'quantity')->get();
        $seasonings = Seasoning::where('post_id', $postId)->select('name', 'quantity')->get();
        return view('post.pages.edit', compact('postId', 'procedures', 'materials', 'seasonings'));
    }

    public function materialShow($post)
    {
        $postId = $post;
        $materials = Material::where('post_id', $postId)->select('name', 'quantity')->get();
        return view('post.pages.material.edit', compact('postId', 'materials'));
    }

    public function materialStore(Request $request)
    {
        Material::create([
            'post_id' => $request->store_postId,
            'name' => $request->store_material,
            'quantity' => $request->store_material_quantity,
        ]);


        return redirect()->route('post.material.show', ['post' => $request->store_postId]);
        // ->with('completion-of-registration-material', '登録が完了しました。');
    }

    public function  materialUpdate(Request $request, Material $material)
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
        return redirect()->route('post.material.show', ['post' => $request->edit_postId]);
        // ->with('completion-of-registration-material', '更新が完了しました。');
    }

    public function seasoningStore(Request $request)
    {
        Seasoning::create([
            'post_id' => $request->store_postId,
            'name' => $request->store_seasoning,
            'quantity' => $request->store_seasoning_quantity,
        ]);


        return redirect()->route('post.material.show', ['post' => $request->store_postId]);
        // ->with('completion-of-registration-material', '登録が完了しました。');

    }

    public function procedureShow($post)
    {
        $postId = $post;
        $procedures = Procedure::where('post_id', $post)->get();
        $path = asset('storage/');
        return view('post.pages.procedure.edit', compact('postId', 'procedures', 'path'));
    }

    public function procedureStore(Request $request)
    {
        $path = $request->file->store('public');

        $order = Procedure::where('post_id', $request->postId)->select('order')->get();
        Procedure::create([
            'post_id' => $request->postId,
            'order' => count($order),
            'photo' => basename($path),
            /* 'photo' => asset('storage/' . basename($path)), */
            'procedure' => $request['procedure'],
        ]);

        return redirect()->route('post.procedure.show', ['post' => $request->postId]);
        // ->with('completion-of-registration-material', '登録が完了しました。');
    }

    public function procedureUpdate(Request $request)
    {
        // Procedure::where('post_recipe_id' , $procedure)->delete();
        $procedures = $request->procedures;
        if (!empty($procedures)) {

            foreach ($procedures as $procedure) {
                dd($procedure);
                $path = $procedure['path']->store('public');

                Procedure::create([
                    'post_id' => $request->edit_postId,
                    'photo' => basename($path),
                    'procedure' => $procedure['procedure'],
                    'order' => 1
                ]);
            }
        }
        return redirect()->route('post.procedure.show', ['post' => $request->edit_postId]);
        // ->with('completion-of-registration-material', '更新が完了しました。');

    }
}
