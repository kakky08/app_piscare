@extends('layouts.app')
@section('header')
    @include('common.navbar.app', ['page' => 'home'])
@endsection
@section('aside')
    @include('common.aside.mypage',  ['page' => 'home'])
@endsection
@section('main')
    {{-- @include('common.tab.mypage',  ['page' => 'home']) --}}
    <h2 class="mypage-title mb-16">記録</h2>
    {{-- @include('mypage.home.components.selectDay') --}}
    {{-- @include('mypage.home.components.recordButton') --}}
    @include('mypage.home.components.calendar')
@endsection
