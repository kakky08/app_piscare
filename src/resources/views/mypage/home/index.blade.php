@extends('layouts.app')
@section('header')
    @include('components.header.app', ['page' => 'home'])
@endsection
@section('aside')
    {{-- @include('components.sidebar.mypage') --}}
@endsection
@section('main')
    <h2>カレンダー</h2>
   {{--  @include('mypage.home.selectDay')
    @include('mypage.home.recordButton')
    @include('mypage.home.calender') --}}
@endsection
