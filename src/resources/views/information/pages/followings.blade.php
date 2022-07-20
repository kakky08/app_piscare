@extends('layouts.single')
@section('header')
        @include('components.header.app')
@endsection
@section('main')
    @include('information.components.profile')
    @include('information.components.tabs', ['isPosts' => false, 'isLikes' => false, 'isFollowings' => true, 'isFollowers' => false])
    @foreach($followings as $following)
        {{ $following->id }}
    @endforeach
@endsection
