@extends('layouts.single')
@section('header')
    @include('common.navbar.app',  ['page' => 'post-edit'])
@endsection
@section('main')
    <div class="card col-md-auto col-lg-auto material-register-form">
        <div class="card-body">
            {{-- 戻るボタン --}}
            <a class="btn b material-form-button-back" href="{{ route('post.edit', ['post' => $post->id]) }}">>>戻る</a>
            <br />
            {{-- 登録完了メッセージ --}}
            @include('post.pages.procedure.components.successMessage')

            {{-- 手順の新規登録フォーム --}}
            @include('post.pages.procedure.components.registerProcedure')

            {{-- 区切り線 --}}
            <hr class="material-form-boundary-line">

            {{-- 手順の更新フォーム --}}
            @include('post.pages.procedure.components.updateProcedure')

        </div>
    </div>
@endsection
