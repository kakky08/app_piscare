@extends('layouts.app')
@section('header')
    @include('common.navbar.app', ['page' => 'home'])
@endsection
@section('aside')
    @include('common.aside.mypage',  ['page' => 'home'])
@endsection
@section('main')
<p>home</p>
<p>目標</p>
<p>{{ $title}}</p>
<p>達成率</p>
<p>{{ $percent }}%</p>


    <small>
    今月は{{ $time }}日魚を食べることが目標です。
    <br />
    現在{{ $count }}日食べています。
</small>

{{-- レシピのカード --}}

<div class="w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
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
@endsection
