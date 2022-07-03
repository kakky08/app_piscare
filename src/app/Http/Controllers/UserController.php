<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id"
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', 1)->first();

        return view('users.show', compact('user'));
    }


    public function follow(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['id' => $id];
    }


    public function unfollow(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['id' => $id];
    }


    public function followings($id)
    {
        $user = User::where('id', $id)->first();

        $followings = $user->followings->sortByDesc('created_at');

        return view('users.followings', compact('user', 'followings'));
    }
}
