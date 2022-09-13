@extends('layouts.single')
@section('header')
    @include('common.navbar.app',  ['page' => 'post'])
@endsection
@section('main')
    <div class="card-body recipe-form-body p-12 relative flex flex-col min-w-0 bg-white bg-clip-border border border-solid border-gray-300 rounded">
        @include('post.message.successMessage')
        <form  id="title-update" class="title-update-form" method="POST" action="{{ route('post.title.update', ['post' => $post->id])}}">
            @csrf
            @method('PUT')
            <div class="relative mr-12 w-full">
            @include('post.message.titleError')
            <input
                type="text"
                name="title"
                value="{{ $post->title }}"
                class="rounded-lg border flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-2xl focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                placeholder="レシピの名前は、30文字以内で入力してください。"
            />
            </div>
            <button
                type="submit"
                form="title-update"
                class="text-white flex-shrink-0 px-4 py-2 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center"
            >
                変更
            </button>
        </form>
        {{-- post Id のインプット --}}
        <div class="flex justify-around items-center flex-wrap border-b border-gray-200 border-solid mb-12 pb-12">
            {{-- 料理画像 --}}
            <form
                method="POST"
                action="{{ route('post.mainImage.update', ['post' => $post->id])}}"
                id="main-image-update"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')
                    @include('post.message.mainImageError')
                    <main-image
                        :image={{ json_encode( $post->image) }}
                    >
                    </main-image>
                    <button
                        type="submit"
                        form="main-image-update"
                        class="w-full justify-center inline-flex items-center py-2 px-3 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:opacity-80 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm md:px-16 px-8 py-2.5 text-center"
                        >
                            画像を更新する
                        </button>
                    <button type="submit" form="main-image-update" class="btn post-edit-button">画像を更新する</button>
            </form>
            {{-- コメント --}}
                @include('post.components.description')
            </div>
            {{-- 材料リスト --}}
                @include('post.components.material')
            {{-- 手順リスト --}}
                @include('post.components.procedure')
        </div>
    </div>
@endsection
