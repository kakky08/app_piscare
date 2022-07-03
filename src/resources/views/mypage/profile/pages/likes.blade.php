@extends('layouts.app')
@section('header')
        @include('components.header.app', ['page' => 'profile'])
@endsection
@section('aside')
    @include('mypage.components.sidebar')
@endsection
@section('main')
    @include('mypage.profile.components.profile')
    @include('mypage.profile.components.tabs', ['isPosts' => false, 'isLikes' => true, 'isFollowings' => false, 'isFollowers' => false])
    @foreach($posts as $post)
        {{ $post->id }}
    @endforeach
    @foreach($recipes as $recipe)
        {{ $recipe->id }}
    @endforeach
@endsection
