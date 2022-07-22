@extends('layouts.app')
@section('header')
        @include('components.header.app', ['page' => 'profile'])
@endsection
@section('aside')
    @include('mypage.components.sidebar')
@endsection
@section('main')
    @include('mypage.profile.components.profile')
    @include('mypage.profile.components.tabs', ['isPosts' => false, 'isLikes' => false, 'isFollowings' => false, 'isFollowers' => true])
    @foreach($followers as $follower)
        <div>
            <div>
                @if (empty($follower->icon))
                    <img src="{{ asset('images/yellowtail.png') }}" class="profile-icon" alt="{{$user->name}}の初期アイコン">
                @else
                    <i class="fas fa-user-circle fa-10x"></i>
                @endif
            </div>
            <div>
                {{ $follower->name }}
            </div>
        </div>
    @endforeach
@endsection
