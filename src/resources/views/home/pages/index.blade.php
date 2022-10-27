@extends('layouts.app')
@section('header')
    @include('common.navbar.app', ['page' => 'home'])
@endsection
@section('aside')
    @include('common.aside.mypage',  ['page' => 'home'])
@endsection
@section('main')
<slider-component
    :latests='{{ json_encode($latests) }}'
    default-image="{{ asset('images/noimage.jpeg')}}"
></slider-component>
<div class="grid grid-cols-1 lg:grid-cols-2">
    {{-- レシピのカード --}}
    <div class="mb-24 lg:mb-0">
        <h2 class="pb-2 border-b mb-4 max-w-sm mx-auto">あなたにおすすめのレシピ</h2>
        <div class="w-full h-96 max-w-sm  mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <a href="{{ route("post.show", ['id' => $recommendation->id ])}}">
            @if (isset($recommendation->image))
                <img class="object-cover object-center w-full h-56" src="https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/{{ $recommendation->image }}" alt="{{ $recommendation->title }}の画像">
            @else
                <img class="object-cover object-center w-full h-56" src="{{ asset('images/noimage.jpeg')}}" alt="{{ $recommendation->title }}の画像">
            @endif

            <div class="px-6 py-4">
                <h1 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $recommendation->title }}</h1>

                <p class="py-2 text-gray-700 dark:text-gray-400 h-20">{{ $recommendation->description }}</p>
            </div>
            </a>
        </div>
    </div>

    {{-- 目標のカード --}}
    <div>
        <h2 class="pb-2 border-b mb-4 max-w-sm mx-auto">目標</h2>
        <div class="w-full h-96 max-w-sm  px-6 py-6 mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <a class="h-full block" href="{{ route("target.index")}}">
                <div class="flex flex-col justify-around items-center h-full">
                    <h3 class="text-xl text-bold">{{ $title}}</h3>
                    <div>
                        <p class="mb-2 text-center">達成率</p>
                        <p class="text-7xl text-bold">{{ $percent }}%</p>
                    </div>


                    <small class="text-sm text-center">
                    今月は{{ $time }}日魚を食べることが目標です。
                    <br />
                    現在{{ $count }}日食べています。
                </small>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
