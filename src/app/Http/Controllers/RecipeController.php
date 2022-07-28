<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\SearchRecipeRequest;
use App\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::orderBy('created_at', 'desc')->paginate(8);
        $categories = Category::all()->load('subCategories')->sortBy('id');
        return view('recipe.pages.index', compact('recipes', 'categories'));
    }

    public function popular()
    {
        $recipes = Recipe::withCount('likes')->orderBy('likes_count', 'desc')->paginate(8);
        $categories = Category::all()->load('subCategories')->sortBy('id');
        return view('recipe.pages.popular', compact('recipes', 'categories'));
    }

    public function show($id)
    {
        $recipe = Recipe::find($id)->load('materials');
        $categories = Category::all()->load('subCategories')->sortBy('id');
        return view('recipe.pages.show', compact('recipe', 'categories'));
    }

    public function search(SearchRecipeRequest $request)
    {
        $recipes = Recipe::where('recipeTitle', 'LIKE', "%$request->keyword%")->orWhere('recipeDescription', 'LIKE', "%$request->keyword%")->orderBy('created_at', 'desc')->paginate(8);
        $categories = Category::all()->load('subCategories')->sortBy('id');
        return view('recipe.pages.index', compact('recipes', 'categories'));

    }

    public function category($id, $name)
    {
        $recipes = Recipe::where('categoryId', 'LIKE', "$id%")->orderBy('created_at', 'desc')->paginate(8);
        $categories = Category::all()->load('subCategories')->sortBy('id');
        return view('recipe.pages.index', compact('recipes', 'categories', 'name'));
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
