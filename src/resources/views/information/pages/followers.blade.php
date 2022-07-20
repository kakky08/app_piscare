@extends('layouts.single')
@section('header')
        @include('components.header.app')
@endsection
@section('main')
    @include('information.components.profile')
    @include('information.components.tabs', ['isPosts' => false, 'isLikes' => false, 'isFollowings' => false, 'isFollowers' => true])
    @foreach($followers as $follower)
        {{ $follower->id }}
    @endforeach
@endsection
