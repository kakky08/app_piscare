@extends('layouts.app')
@section('header')
        @include('components.header.app', ['page' => 'setting'])
@endsection
@section('aside')
    @include('mypage.components.sidebar')
@endsection
@section('main')
    <h1 class="mypage-title">Setting</h1>
    <h2 class="mypage-subtitle">メールアドレスの変更</h2>
    <div class="setting-email">
        <div class="setting-block">
            <p class="setting-title">現在のメールアドレス</p>
            <p class="setting-text">{{ $user->email }}</p>
        </div>
        <div class="setting-block">
            <p class="setting-title">新しいメールアドレス</p>
            <input type="email" class="setting-input" placeholder="新しいメールアドレス">
        </div>
        <button type="submit" class="btn setting-button">メールアドレスを変更する</button>
    </div>
    <h2 class="mypage-subtitle">パスワードの変更</h2>
    <div class="setting-password">
        <div class="setting-block">
            <p class="setting-title">以前のパスワード</p>
            <input type="password" class="setting-input" placeholder="以前のパスワード">
        </div>
        <div class="setting-block">
            <p class="setting-title">新しいパスワード</p>
            <input type="password" class="setting-input" placeholder="新しいパスワード">
        </div>
        <div class="setting-block">
            <p class="setting-title">パスワードの確認</p>
            <input type="password" class="setting-input" placeholder="パスワードの確認">
        </div>
        <button type="submit" class="btn setting-button">パスワードを変更する</button>
    </div>
    {{-- <icon-register
        endpoint="{{ route('setting.icon')}}"
    >
    </icon-register> --}}
    {{-- <image-component></image-component> --}}
@endsection
