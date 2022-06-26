<?php

namespace App\Http\Controllers;

use App\Category;
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
        return view('recipe.index', compact('recipes', 'categories', 'subCategories'));
    }

    public function search(Request $request)
    {
        $recipes = Recipe::where('recipeTitle', 'LIKE', "%$request->search%")->orWhere('recipeDescription', 'LIKE', "%$request->search%")->orderBy('created_at', 'desc')->paginate(20);
        $categories = Category::all()->sortBy('id');
        $subCategories = SubCategory::all()->sortBy('id');
        return view('recipe.index', compact('recipes', 'categories', 'subCategories'));

    }

    public function category($id)
    {
        $recipes = Recipe::where('categoryId', 'LIKE', "$id%")->orderBy('created_at', 'desc')->paginate(20);
        $categories = Category::all()->sortBy('id');
        $subCategories = SubCategory::all()->sortBy('id');
        return view('recipe.index', compact('recipes', 'categories', 'subCategories'));
    }
}
