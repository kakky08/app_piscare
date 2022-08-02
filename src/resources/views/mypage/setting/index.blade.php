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
    @if (isset($user->password))
        <h2 class="mypage-subtitle">パスワードの変更</h2>
        @include('mypage.setting.message.updatePasswordError')
        <form id="updatePassword" action="POST" action="{{ route('setting.updatePassword', ['user' => $user ])}}">
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
                <button type="submit" form="updatePassword" class="btn setting-button">パスワードを変更する</button>
            </div>
        </form>
    @endif
    {{-- <icon-register
        endpoint="{{ route('setting.icon')}}"
    >
    </icon-register> --}}
    <h2 class="mypage-subtitle">アイコンの変更</h2>
    <form id="updateIcon" action="POST">
        @method("PATCH")
        @csrf
        <div class="setting-icon-group">
            <div class="setting-icon-old">
                <p class="setting-icon-text">現在のアイコン</p>
                @if (empty($user->icon))
                    <img src="{{ asset('images/yellowtail.png') }}" class="profile-icon" alt="{{$user->name}}の初期アイコン">
                @else
                    <img src="https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/{{ $user->icon }}" alt="{{$user->name}}のアイコン">
                @endif
            </div>
            <div class="setting-icon-new">
                <p class="setting-icon-text">新しいアイコン</p>
                <icon-component></icon-component>
            </div>
            <div>
                <button type="submit" form="updateIcon" class="btn setting-button setting-icon-button">アイコンを変更する</button>
            </div>
        </div>
    </form>
@endsection
