<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\SearchRecipeRequest;
use App\Recipe;
use App\SubCategory;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::orderBy('created_at', 'desc')->paginate(20);
        $categories = Category::all()->sortBy('id');
        $subCategories = SubCategory::all()->sortBy('id');
        return view('recipe.pages.index', compact('recipes', 'categories', 'subCategories'));
    }

    public function popular()
    {
        // $recipes = Recipe::orderBy('created_at', 'desc')->paginate(20);
        $recipes = Recipe::withCount('likes')->orderBy('likes_count', 'desc')->paginate(20);
        $categories = Category::all()->sortBy('id');
        $subCategories = SubCategory::all()->sortBy('id');
        return view('recipe.pages.popular', compact('recipes', 'categories', 'subCategories'));
    }

    public function show($id)
    {
        $recipe = Recipe::where('id', $id)->first();
        $categories = Category::all()->sortBy('id');
        $subCategories = SubCategory::all()->sortBy('id');
        return view('recipe.show', compact('recipe', 'categories', 'subCategories'));
    }

    public function search(SearchRecipeRequest $request)
    {
        $recipes = Recipe::where('recipeTitle', 'LIKE', "%$request->keyword%")->orWhere('recipeDescription', 'LIKE', "%$request->keyword%")->orderBy('created_at', 'desc')->paginate(20);
        $categories = Category::all()->sortBy('id');
        $subCategories = SubCategory::all()->sortBy('id');
        return view('recipe.pages.index', compact('recipes', 'categories', 'subCategories'));

    }

    public function category($id)
    {
        $recipes = Recipe::where('categoryId', 'LIKE', "$id%")->orderBy('created_at', 'desc')->paginate(20);
        $categories = Category::all()->sortBy('id');
        $subCategories = SubCategory::all()->sortBy('id');
        return view('recipe.pages.index', compact('recipes', 'categories', 'subCategories'));
    }

    /**
     * いいね機能
     */
    public function like(Request $request, Recipe $recipe)
    {
        $recipe->likes()->detach($request->user()->id);
        $recipe->likes()->attach($request->user()->id);

        return [
            'id' => $recipe->id,
            'countLikes' => $recipe->count_likes,
        ];
    }

    public function unlike(Request $request, Recipe $recipe)
    {
        $recipe->likes()->detach($request->user()->id);

        return [
            'id' => $recipe->id,
            'countLikes' => $recipe->count_likes,
        ];
    }
}
