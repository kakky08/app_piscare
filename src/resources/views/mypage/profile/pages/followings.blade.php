@extends('layouts.app')
@section('header')
        @include('components.header.app', ['page' => 'profile'])
@endsection
@section('aside')
    @include('mypage.components.sidebar')
@endsection
@section('main')
    @include('mypage.profile.components.profile')
    @include('mypage.profile.components.tabs', ['isPosts' => false, 'isLikes' => false, 'isFollowings' => true, 'isFollowers' => false])
    <ul class="follow-list">
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
         <li class="follow-item">
                <a href="" class="follow-item-link">
                    <img src="" class="follow-item-image" alt="初期アイコン">
                    <p class="follow-item-name">あいうえおあいうえお</p>
                    <button>test</button>
                </a>
            </li>
    </ul>
@endsection
