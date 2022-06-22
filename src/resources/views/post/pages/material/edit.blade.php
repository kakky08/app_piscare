@extends('layouts.single')
@section('header')
    @include('components.header.app')
@endsection
@section('main')
    <div class="card col-md-auto col-lg-auto material-register-form">
        <div class="card-body">
            {{-- 戻るボタン --}}
            <a class="btn button-back" href="{{-- {{ route('materialCreate.back', ['materialCreate' => $postId]) }} --}}">>>戻る</a>
            <br />
            {{-- 登録完了メッセージ --}}
            @include('post.pages.material.components.successMessage')

            {{-- 人数の登録フォーム --}}
            @include('post.pages.material.components.registerPeople')

            {{-- 区切り線 --}}
            <p class="border-bottom boundary-line"></p>

            {{-- 材料の新規登録フォーム --}}
            @include('post.pages.material.components.registerMaterial')

            {{-- 区切り線 --}}
            <p class="border-bottom boundary-line"></p>

            {{-- 材料の更新フォーム --}}
            @include('post.pages.material.components.updateMaterial')

            {{-- 区切り線 --}}
            <p class="border-bottom boundary-line"></p>

            {{-- 調味料の新規登録フォーム --}}
            @include('post.pages.material.components.registerSeasoning')

            {{-- 区切り線 --}}
            <p class="border-bottom boundary-line"></p>

            {{-- 調味料の更新フォーム --}}
            @include('post.pages.material.components.updateSeasoning')

        </div>
    </div>

@endsection
