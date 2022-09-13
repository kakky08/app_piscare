@extends('layouts.single')
@section('header')
        @include('common.navbar.app', ['page' => 'information'])
@endsection
@section('main')
    @include('information.components.profile')
    @include('information.components.tabs', ['isPosts' => false, 'isLikes' => false, 'isFollowings' => false, 'isFollowers' => true])
    <ul class="follow-list">
    @foreach($information->followers as $follower)
        <li class="ist-none shadow-sm rounded-2xl bg-white dark:bg-gray-800 px-16 py-4 mb-4">
            <div class="flex-row gap-4 flex justify-center items-center">
                <div class="flex-shrink-0">
                    <a href="{{route('information.show', ['name' => $follower->name ])}}" class="block relative">
                        @if (empty($following->icon))
                            <img src="{{ asset('images/yellowtail.png') }}" class="mx-auto object-cover rounded-full h-16 w-16 border-1 rounded-bl-full border-yellow-300" alt="{{$following->name}}の初期アイコン" />
                        @else
                            <img src="https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/{{ $following->icon }}" class="mx-auto object-cover rounded-full h-16 w-16 border-1 rounded-bl-full border-yellow-300" alt="{{$following->name}}のアイコン" />
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
            </div>
        </li>
    @endforeach
@endsection
