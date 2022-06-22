<?php

namespace App\Http\Controllers;

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

    public function edit($post)
    {
        return view('post.pages.edit');
    }
}
