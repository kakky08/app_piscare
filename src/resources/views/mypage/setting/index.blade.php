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
        <p>現在のメールアドレス</p>
        <p class="setting-text">test@gmail.com</p>
        <p>新しいメールアドレス</p>
        <div class="row cols-2">
            <input type="email" class="col setting-input" placeholder="新しいメールアドレス">
            <button type="submit" class="btn col-1 btn-primary setting-button">変更</button>
        </div>
    </div>
    <h2 class="mypage-subtitle">パスワードの変更</h2>
    <div class="setting-password">
        <div class="row cols-2">
            <input type="password" class="col setting-input" placeholder="新しいパスワード">
            <button type="submit" class="btn col-1 btn-primary setting-button">変更</button>
        </div>
    </div>
    {{-- <icon-register
        endpoint="{{ route('setting.icon')}}"
    >
    </icon-register> --}}
    {{-- <image-component></image-component> --}}
@endsection
