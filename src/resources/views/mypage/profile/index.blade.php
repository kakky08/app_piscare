@extends('layouts.app')
@section('header')
        @include('components.header.app', ['page' => 'profile'])
@endsection
@section('aside')
    @include('mypage.components.sidebar')
@endsection
@section('main')
    <h1 class="mypage-title">Profile</h1>
        @if(Auth::id() !== $user->id)
                <follow-button
                class="ml-auto"
                :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                :authorized='@json(Auth::check())'
                endpoint='{{ route('user.follow', ['id' => $user->id]) }}'
                >
                </follow-button>
        @endif
    @include('mypage.profile.profile')
    @include('mypage.profile.tabs', ['isPosts' => true, 'isLikes' => false, 'isFollowings' => false, 'isFollowers' => false])
    {{-- @foreach($posts as $post)
        {{ $post->id }}
    @endforeach --}}
@endsection
