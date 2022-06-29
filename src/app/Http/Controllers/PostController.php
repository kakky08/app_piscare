<?php

namespace App\Http\Controllers;

use App\Post;
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
        return view('post.pages.edit');
    }

    public function materialEdit($post)
    {
        return view('post.pages.material.edit');
    }

    public function procedureEdit($post)
    {
        return view('post.pages.procedure.edit');
    }
}
