@extends('layouts.app')
@section('header')
        @include('components.header.app', ['page' => 'profile'])
@endsection
@section('aside')
    @include('mypage.components.sidebar')
@endsection
@section('main')
    <div class="card">
    <div class="card-body">
        <div class="d-flex flex-row">
            <a href="{{ route('user.show', ['id' => $user->id]) }}" class="text-dark">
                <i class="fas fa-user-circle fa-3x"></i>
            </a>
            @if(Auth::id() !== $user->id)
                <follow-button
                class="ml-auto"
                :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                :authorized='@json(Auth::check())'
                endpoint='{{ route('user.follow', ['id' => $user->id]) }}'
                >
                </follow-button>
            @endif
        </div>
        <h2 class="h5 card-title m-0">
            <a href="{{ route('user.show', ['id' => $user->id]) }}" class="text-dark">
                {{ $user->name }}
            </a>
        </h2>
    </div>
    <div class="card-body">
        <div class="card-text">
            <a href="" class="text-muted">
                {{ $user->count_followings }} フォロー
            </a>
            <a href="" class="text-muted">
                {{ $user->count_followers }} フォロワー
            </a>
        </div>
    </div>
</div>
@endsection
