<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('mypage.setting.index');
    }

    public function updateEmail(Request $request, User $user)
    {

        $user->fill($request->all())->save();
        return redirect()->route('setting.index');
    }
}
