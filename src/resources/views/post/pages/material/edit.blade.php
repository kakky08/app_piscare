@extends('layouts.single')
@section('header')
    @include('components.header.app')
@endsection
@section('main')
    <div class="card col-md-auto col-lg-auto material-register-form">
        <div class="card-body">
            {{-- 戻るボタン --}}
            <a class="btn material-form-button-back" href="{{ route('post.edit', ['post' => $post->id]) }}">>>戻る</a>
            <br />
            {{-- 登録完了メッセージ --}}
            @include('post.pages.material.message.successMessage')

            {{-- 人数の登録フォーム --}}
            @include('post.pages.material.components.registerPeople')

            {{-- 区切り線 --}}
            <hr class="material-form-boundary-line">

            {{-- 材料の新規登録フォーム --}}
            @include('post.pages.material.components.registerMaterial')

            {{-- 区切り線 --}}
            <hr class="material-form-boundary-line">

            {{-- 材料の更新フォーム --}}
            @include('post.pages.material.components.updateMaterial')

            {{-- 区切り線 --}}
            <hr class="material-form-boundary-line">

            {{-- 調味料の新規登録フォーム --}}
            @include('post.pages.material.components.registerSeasoning')

            {{-- 区切り線 --}}
            <hr class="material-form-boundary-line">

            {{-- 調味料の更新フォーム --}}
            @include('post.pages.material.components.updateSeasoning')

        </div>
    </div>

@endsection
