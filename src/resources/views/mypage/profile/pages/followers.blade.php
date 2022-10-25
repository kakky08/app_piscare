@extends('layouts.app')
@section('header')
        @include('common.navbar.app', ['page' => 'profile'])
@endsection
@section('aside')
    @include('common.aside.mypage',  ['page' => 'profile'])
@endsection
@section('main')
    @include('common.tab.mypage',  ['page' => 'profile'])
    @include('mypage.profile.components.profile')
    @include('mypage.profile.components.tabs', ['isPosts' => false, 'isLikes' => false, 'isFollowings' => false, 'isFollowers' => true])
    <ul class="follow-list">
    @foreach($user->followers as $follower)
        <li class="ist-none shadow-sm rounded-2xl bg-white dark:bg-gray-800 px-16 py-4 mb-4">
                <div class="flex-row gap-4 flex items-center {{ Auth::id() !== $follower->id ? 'justify-center' : ''}}">
                    <div class="flex-shrink-0">
                        <a href="{{route('information.show', ['name' => $follower->name ])}}" class="block relative">
                            @if (empty($follower->icon))
                                <img src="{{ asset('images/yellowtail.png') }}" class="mx-auto object-cover rounded-full h-16 w-16 border-1 rounded-bl-full border-yellow-300" alt="{{$follower->name}}の初期アイコン" />
                            @else
                                <img src="https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/{{ $follower->icon }}" class="mx-auto object-cover rounded-full h-16 w-16 border-1 rounded-bl-full border-yellow-300" alt="{{$follower->name}}のアイコン" />
                            @endif
                        </a>
                    </div>
                    <div>
                        <a href="{{route('information.show', ['name' => $follower->name ])}}" class="block relative">
                            <span class="text-gray-600 dark:text-white text-lg font-medium pl-8">
                                {{ $follower->name }}
                            </span>
                        </a>
                    </div>
                    @if (Auth::id() !== $follower->id)
                        <follow-button
                            class="ml-auto"
                            :initial-is-followed-by='@json($follower->isFollowedBy(Auth::user()))'
                            :authorized='@json(Auth::check())'
                            endpoint='{{ route('user.follow', ['id' => $follower->id]) }}'
                            >
                        </follow-button>
                    @endif
                </div>
            </li>
    @endforeach
@endsection
