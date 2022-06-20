@extends('layouts.app')
@section('header')
        @include('components.header.app', ['page' => 'profile'])
@endsection
@section('aside')
    @include('mypage.components.sidebar')
@endsection
@section('main')
    <h1 class="mypage-title">Profile</h1>
    @include('mypage.profile.profile')
    @include('mypage.profile.tabs', ['isPosts' => true, 'isLikes' => false, 'isFollowings' => false, 'isFollowers' => false])
    {{-- @foreach($posts as $post)
        {{ $post->id }}
    @endforeach --}}
@endsection
