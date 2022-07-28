<?php

namespace App\Http\Controllers;

use App\User;

class ProfileController extends Controller
{
    public function show($name)
    {
        // アクセス設定
        $user = User::where('name', $name)->first()->load('posts');
        $this->authorize('ctrlMyPage', $user);

        return view('mypage.profile.pages.show', compact('user'));
    }


    public function likes($name)
    {
        // アクセス設定
        $user = User::where('name', $name)->first()->load('postLikes', 'recipeLikes');
        $this->authorize('ctrlMyPage', $user);

        return view('mypage.profile.pages.likes', compact('user'));
    }

    public function followings($name)
    {
        // アクセス設定
        $user = User::where('name', $name)->first()->load('followings');
        $this->authorize('ctrlMyPage', $user);

        return view('mypage.profile.pages.followings', compact('user'));
    }

    public function followers($name)
    {
        // アクセス設定
        $user = User::where('name', $name)->first()->load('followers');
        $this->authorize('ctrlMyPage', $user);

        return view('mypage.profile.pages.followers', compact('user'));
    }
}
