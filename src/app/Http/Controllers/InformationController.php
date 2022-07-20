<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function show($name)
    {
        $information = User::where('name', $name)->first();
        $posts = $information->posts->sortByDesc('created_at');
        return view('information.pages.show', compact('information', 'posts'));
    }

    public function likes($name)
    {
        $information = User::where('name', $name)->first();
        $posts = $information->postLikes->sortByDesc('created_at');
        $recipes = $information->recipeLikes->sortByDesc('created_at');
        return view('information.pages.likes', compact('information', 'posts', 'recipes'));
    }

    public function followings($name)
    {
        $information = User::where('name', $name)->first();
        $followings = $information->followings->sortByDesc('created_at');
        return view('information.pages.followings', compact('information', 'followings'));
    }

    public function followers($name)
    {
        $information = User::where('name', $name)->first();
        $followers = $information->followers->sortByDesc('created_at');
        return view('information.pages.followers', compact('information', 'followers'));
    }

}
