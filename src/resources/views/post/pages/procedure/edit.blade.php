@extends('layouts.single')
@section('header')
    @include('components.header.app')
@endsection
@section('main')
    <div class="card col-md-auto col-lg-auto material-register-form">
        <div class="card-body">
            {{-- 戻るボタン --}}
            <a class="btn button-back" href="{{ route('post.edit', ['post' => $postId]) }}">>>戻る</a>
            <br />
            {{-- 登録完了メッセージ --}}
            @include('post.pages.procedure.components.successMessage')

            {{-- 手順の新規登録フォーム --}}
            @include('post.pages.procedure.components.registerProcedure')

            {{-- 区切り線 --}}
            <p class="border-bottom boundary-line"></p>

            {{-- 手順の更新フォーム --}}
            @include('post.pages.procedure.components.updateProcedure')

        </div>
    </div>
@endsection
