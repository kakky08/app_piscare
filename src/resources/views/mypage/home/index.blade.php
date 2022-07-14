@extends('layouts.app')
@section('header')
    @include('components.header.app', ['page' => 'home'])
@endsection
@section('aside')
    @include('mypage.components.sidebar')
@endsection
@section('main')
    <h2>カレンダー</h2>
    @include('mypage.home.components.selectDay')
    @include('mypage.home.components.recordButton')
    @include('mypage.home.components.calendar')
@endsection
