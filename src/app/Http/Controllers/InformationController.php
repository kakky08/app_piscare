<?php

namespace App\Http\Controllers;

use App\User;

class InformationController extends Controller
{
    public function show($name)
    {
        $information = User::where('name', $name)->first()->load('posts');

        return view('information.pages.show', compact('information'));
    }

    public function likes($name)
    {
        $information = User::where('name', $name)->first()->load('postLikes', 'recipeLikes');

        return view('information.pages.likes', compact('information'));
    }

    public function followings($name)
    {
        $information = User::where('name', $name)->first()->load('followings');

        return view('information.pages.followings', compact('information'));
    }

    public function followers($name)
    {
        $information = User::where('name', $name)->first()->load('followers');

        return view('information.pages.followers', compact('information'));
    }

}
