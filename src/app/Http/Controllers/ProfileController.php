<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show($name)
    {
        $user = User::where('name', $name)->first();
        $posts = $user->posts->sortByDesc('created_at');
        return view('mypage.profile.pages.show', compact('user', 'posts'));
    }


    public function likes($name)
    {
        $user = User::where('name', $name)->first();
        $posts = $user->postLikes->sortByDesc('created_at');
        $recipes = $user->recipeLikes->sortByDesc('created_at');
        return view('mypage.profile.pages.likes', compact('user', 'posts', 'recipes'));
    }

    public function followings($name)
    {
        $user = User::where('name', $name)->first();
        $followings = $user->followings->sortByDesc('created_at');
        return view('mypage.profile.pages.followings', compact('user', 'followings'));
    }

    public function followers($name)
    {
        $user = User::where('name', $name)->first();
        $followers = $user->followers->sortByDesc('created_at');
        return view('mypage.profile.pages.followers', compact('user', 'followers'));
    }
}
