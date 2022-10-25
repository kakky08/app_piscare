@extends('layouts.app')
@section('header')
    @include('common.navbar.app',  ['page' => 'post-create'])
@endsection
@section('aside')
    @include('common.aside.mypage')
@endsection
@section('main')
    <div class="mx-auto w-3/4">
        <h2 class="mb-8 text-4xl">レシピ名の登録</h2>
        <div class="p-12 relative flex flex-col min-w-0 bg-white bg-clip-border border border-solid border-gray-300 roundedorm">
            <form method="POST" action="{{ route('post.store')}}" id="title-update">
                @csrf
                <label for="postRecipeName" class="block mb-3 text-md font-medium text-gray-900 dark:text-gray-400">レシピ名を入力してください</label>
                @include('post.message.createError')
                <input
                    type="text"
                    name="title"
                    id="postRecipeName"
                    class="rounded-lg border flex-1 appearance-none border border-gray-300 w-full mb-8 py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    placeholder="レシピの名前は、30文字以内で入力してください。"
                />
                <button
                    type="submit"
                    form="title-update"
                    class="text-white w-full flex-shrink-0 px-4 py-2 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center"
                >
                    新規登録
                </button>
            </form>
        </div>
    </div>
@endsection
