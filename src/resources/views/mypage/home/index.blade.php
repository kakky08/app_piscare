@extends('layouts.app')
@section('header')
    @include('components.header.app', ['page' => 'home'])
@endsection
@section('aside')
    @include('mypage.components.sidebar',  ['page' => 'home'])
@endsection
@section('main')
    <h2 class="mypage-title">カレンダー</h2>
    @include('mypage.home.components.selectDay')
    @include('mypage.home.components.recordButton')
    @include('mypage.home.components.calendar')
@endsection
