@extends('layouts.single')
@section('header')
    @include('common.navbar.app', ['page' => 'post'])
@endsection
@section('main')

<div class="p-12 relative flex flex-col min-w-0 bg-white bg-clip-border border border-solid border-gray-300 rounded">
    <div class="show-card-section">
        <div class="flex justify-between items-center mb-8 flex-wrap">
            @if(Auth::id() !== $recipe->user_id)
            <button
                type="button"
                onClick="history.back()"
                class="w-32 md:w-20 justify-center inline-flex items-center py-2 px-3 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:opacity-80 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm md:px-16 px-8 py-2.5 text-center"
            >
                <svg class="mr-2 -ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                戻る
            </button>
            @else
            <button
                type="button"
                onClick="history.back()"
                class="w-32 md:w-20 mb-8 sm:mb-0 justify-center inline-flex items-center py-2 px-3 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:opacity-80 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm md:px-16 px-8 py-2.5 text-center"
            >
                <svg class="mr-2 -ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                戻る
            </button>
            @endif
            <div class="show-card-button-action">
                @if(Auth::id() !== $recipe->user_id)
                <post-like
                    :initial-is-liked-by='@json($recipe->isLikedBy(Auth::user()))'
                    :initial-count-likes='@json($recipe->count_likes)'
                    :authorized='@json(Auth::check())'
                    endpoint="{{ route('recipe.like', ['recipe' => $recipe->id]) }}"
                >
                </post-like>
                @else
                <i class="fas fa-heart mr-1 fa-2x text-red-500"></i>
                <span class="show-card-icon-count">{{ $recipe->countLikes }}</span>
                <form action="{{ route('post.edit', ['post' => $recipe->id]) }}" method="GET">
                    <button
                        type="submit"
                        class="w-32 md:w-20 ml-12 justify-center inline-flex items-center py-2 px-3 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:opacity-80 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm md:px-16 px-8 py-2.5 text-center"
                    >
                        編集
                    </button>
                </form>
                <form action="{{ route('post.destroy', ['post' => $recipe->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="w-32 md:w-20 ml-12 justify-center inline-flex items-center py-2 px-3 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:opacity-80 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm md:px-16 px-8 py-2.5 text-center"
                    >
                        削除
                    </button>
                </form>
                @endif
                @if(Auth::id() !== $recipe->user_id)
                    <follow-button
                        class="ml-auto show-card-button-follow"
                        :initial-is-followed-by='@json($recipe->user->isFollowedBy(Auth::user()))'
                        :authorized='@json(Auth::check())'
                        endpoint='{{ route('user.follow', ['id' => $recipe->user_id]) }}'
                    >
                    </follow-button>
                @endif
            </div>
        </div>
        <h2 class="mb-8 text-4xl">{{ $recipe->title }}</h2>
        <div class="flex flex-wrap justify-around items-center">
            @if (isset($recipe->image))
                <img class="w-96 h-96  object-cover bg-center" src="https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/{{ $recipe->image }}" alt="{{ $recipe->title }}の料理画像">
            @else
                <img class="w-96 h-96 object-cover bg-center" src="{{ asset('images/noimage.jpeg') }}" alt="イメージ画像はありません">
            @endif
            <div class="p-8">
                <p class="text-xl mb-12"><span class="font-bold">投稿者</span> : <a href="{{ route('information.show', ['name' => $recipe->user->name ])}}">{{ $recipe->user->name }}</a></p>
                <p class="text-xl mb-8"><span class="font-bold">コメント</span></p>
                <p class="text-xl ml-4 max-w-sm">{{ $recipe->description}}</p>
            </div>
        </div>
    </div>
    <hr class="mb-12 bg-gray-400">
    <h3 class="text-3xl mb-8">材料 <span class="text-2xl ml-4 font-semibold">{{$recipe->people}}人前</span></h3>
        @if (isset($recipe->materials))
            <ul class="list-none mb-8">
                @foreach ($recipe->materials as $material)
                    <li>
                        <ul class="flex justify-between pb-4 px-8 mb-4 border-b border-solid border-gray-300">
                            <li class="text-xl list-none">{{ $material->name }}</li>
                            <li class="text-xl list-none">{{ $material->quantity }}</li>
                        </ul>
                    </li>
                @endforeach
            </ul>
        @endif
    <h3 class="text-3xl mb-8">調味料</h3>
        @if (isset($recipe->seasonings))
            <ul class="list-none mb-8">
                @foreach ($recipe->seasonings as $seasoning)
                    <li>
                        <ul class="flex justify-between pb-4 px-8 mb-4 border-b border-solid border-gray-300">
                            <li class="text-xl list-none">{{ $seasoning->name }}</li>
                            <li class="text-xl list-none">{{ $seasoning->quantity }}</li>
                        </ul>
                    </li>
                @endforeach
            </ul>
        @endif
    <hr class="mb-12 bg-gray-400">
    <h3 class="text-3xl mb-8">手順</h3>
        @if (isset($recipe->procedures))
            <ul>
                @foreach ($recipe->procedures as $procedure)
                    <li class="mb-12">
                        <ul>
                            <li>
                                <p class="font-semibold text-xl">{{ $procedure->order + 1 }}.</p>
                                <div class="flex flex-wrap justify-around items-center">
                                    @if (isset($procedure->photo))
                                        <img class="w-72 h-72 mb-8 sm:mb-0 object-cover bg-center" src="https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/{{ $procedure->photo }}" alt="手順{{ $procedure->order }}の画像">
                                    @else
                                        <img class="w-72 h-72 mb-8 sm:mb-0 object-cover bg-center" src="{{ asset('images/noimage.jpeg') }}" alt="手順の画像はありません">
                                    @endif
                                    <p class="text-xl sm:p-4 w-11/12 sm:w-5/12">{{ $procedure->procedure }}</p>
                                </div>
                            </li>

                        </ul>
                    </li>
                @endforeach
            </ul>
        @endif
</div>

@endsection
