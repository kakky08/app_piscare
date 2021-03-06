<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmailRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index()
    {
        return view('mypage.setting.index');
    }

    public function updateEmail(UpdateEmailRequest $request, User $user)
    {
        dd('test');

        $user->fill($request->all())->save();
        return redirect()->route('setting.index')->with('completion-of-update-email', 'メールアドレスの更新が完了しました。');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
dd('test');
$usre = Auth::user();
        if(!password_verify($request->current_password, $user->password))
        {
            return redirect()->route('setting.index')->with('warning-password', 'パスワードが違います');
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->route('setting.index')->with('conpletion-of-update-password', 'パスワードの更新が完了しました。');
    }
}
