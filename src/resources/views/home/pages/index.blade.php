@extends('layouts.app')
@section('header')
    @include('common.navbar.app', ['page' => 'home'])
@endsection
@section('aside')
    @include('common.aside.mypage',  ['page' => 'home'])
@endsection
@section('main')
<p>home</p>
<p>目標</p>
<p>{{ $title}}</p>
<p>達成率</p>
<p>{{ $percent }}%</p>


    <small>
    今月は{{ $time }}日魚を食べることが目標です。
    <br />
    現在{{ $count }}日食べています。
</small>
@endsection
