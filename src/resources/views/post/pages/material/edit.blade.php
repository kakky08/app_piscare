@extends('layouts.single')
@section('header')
    @include('common.navbar.app',  ['page' => 'post-edit'])
@endsection
@section('main')
    {{-- <div class="card col-md-auto col-lg-auto material-register-form"> --}}
    <div class="p-12 md:p-24 relative flex flex-col min-w-0 bg-white bg-clip-border rounded-md border border-solid border-gray-300 roundedorm">
            {{-- 戻るボタン --}}
            <button
                type="button"
                onClick="history.back()"
                class="w-32 md:w-20 justify-center inline-flex items-center mb-16 py-2 px-3 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:opacity-80 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm md:px-16 px-8 py-2.5 text-center"
            >
                <svg class="mr-2 -ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                戻る
            </button>
            <br />
            {{-- 登録完了メッセージ --}}
            @include('post.pages.material.message.successMessage')

            {{-- 人数の登録フォーム --}}
            @include('post.pages.material.components.registerPeople')

            {{-- 区切り線 --}}
            <hr class="mb-12 bg-gray-400">

            {{-- 材料の新規登録フォーム --}}
            @include('post.pages.material.components.registerMaterial')

            {{-- 区切り線 --}}
            <hr class="mb-12 bg-gray-400">

            {{-- 材料の更新フォーム --}}
            @include('post.pages.material.components.updateMaterial')

            {{-- 区切り線 --}}
            <hr class="mb-12 bg-gray-400">

            {{-- 調味料の新規登録フォーム --}}
            @include('post.pages.material.components.registerSeasoning')

            {{-- 区切り線 --}}
            <hr class="mb-12 bg-gray-400">

            {{-- 調味料の更新フォーム --}}
            @include('post.pages.material.components.updateSeasoning')

    </div>

@endsection
