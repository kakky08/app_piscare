@extends('layouts.single')
@section('header')
        @include('components.header.app')
@endsection
@section('main')
    @include('information.components.profile')
    @include('information.components.tabs', ['isPosts' => false, 'isLikes' => false, 'isFollowings' => true, 'isFollowers' => false])
    @foreach($followings as $following)
        <li class="follow-item">
            <a href="{{route('information.show', ['name' => $following->name ])}}" class="follow-item-link">
                @if (empty($following->icon))
                    <img src="{{ asset('images/yellowtail.png') }}" class="follow-item-image" alt="{{$user->name}}の初期アイコン">
                @else
                    <i class="fas fa-user-circle fa-10x"></i>
                @endif
                <p class="follow-item-name">{{ $following->name }}</p>
                <follow-button
                class="ml-auto"
                :initial-is-followed-by='@json($following->isFollowedBy(Auth::user()))'
                :authorized='@json(Auth::check())'
                endpoint='{{ route('user.follow', ['id' => $user->id]) }}'
                >
                </follow-button>
            </a>
        </li>
    @endforeach
@endsection
