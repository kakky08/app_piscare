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
        return view('mypage.profile.show', compact('user', 'posts'));
    }

}
