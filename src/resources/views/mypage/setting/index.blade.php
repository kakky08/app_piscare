@extends('layouts.app')
@section('header')
        @include('components.header.app', ['page' => 'setting'])
@endsection
@section('aside')
    @include('mypage.components.sidebar',  ['page' => 'setting'])
@endsection
@section('main')
    <h1 class="mypage-title">Setting</h1>
    @include('mypage.setting.message.successMessage')
    <h2 class="mypage-subtitle">メールアドレスの変更</h2>
    @include('mypage.setting.message.updateEmailError')
    <div class="setting-email">
        <div class="setting-block">
            <p class="setting-title">現在のメールアドレス</p>
            <p class="setting-text">{{ $user->email }}</p>
        </div>
        <div class="setting-block">
            <p class="setting-title">新しいメールアドレス</p>
            <form id="updateEmail" method="POST" action="{{ route('setting.updateEmail', ['user' => $user ]) }}">
                @method("PATCH")
                @csrf
                <input type="email" class="setting-input" name="email" placeholder="新しいメールアドレス">
            </form>
        </div>
        <button type="submit" form="updateEmail" class="btn setting-button">メールアドレスを変更する</button>
    </div>
    <h2 class="mypage-subtitle">パスワードの変更</h2>
    @include('mypage.setting.message.updatePasswordError')
    <form action="POST" action="{{ route('setting.updatePassword', ['user' => $user->id ])}}">
        @method("PATCH")
        @csrf
        <div class="setting-password">
            <div class="setting-block">
                <p class="setting-title">以前のパスワード</p>
                <input type="password" class="setting-input" name="current_password" placeholder="以前のパスワード">
            </div>
            <div class="setting-block">
                <p class="setting-title">新しいパスワード</p>
                <input type="password" class="setting-input" name="new_password" placeholder="新しいパスワード">
            </div>
            <div class="setting-block">
                <p class="setting-title">パスワードの確認</p>
                <input type="password" class="setting-input" name="new_password_confirmation" placeholder="パスワードの確認">
            </div>
            <button type="submit" class="btn setting-button">パスワードを変更する</button>
        </div>
    </form>
    {{-- <icon-register
        endpoint="{{ route('setting.icon')}}"
    >
    </icon-register> --}}
    {{-- <image-component></image-component> --}}
@endsection
