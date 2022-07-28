@extends('layouts.single')
@section('header')
        @include('components.header.app')
@endsection
@section('main')
    @include('information.components.profile')
    @include('information.components.tabs', ['isPosts' => false, 'isLikes' => false, 'isFollowings' => false, 'isFollowers' => true])
    @foreach($information->followers as $follower)
        <li class="follow-item">
            <a href="{{route('information.show', ['name' => $follower->name ])}}" class="follow-item-link">
                @if (empty($follower->icon))
                    <img src="{{ asset('images/yellowtail.png') }}" class="follow-item-image" alt="{{$user->name}}の初期アイコン">
                @else
                    <i class="fas fa-user-circle fa-10x"></i>
                @endif
                <p class="follow-item-name">{{ $follower->name }}</p>
            </a>
        </li>
    @endforeach
@endsection
