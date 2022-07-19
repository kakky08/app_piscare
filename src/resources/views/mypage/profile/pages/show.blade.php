@extends('layouts.app')
@section('header')
        @include('components.header.app', ['page' => 'profile'])
@endsection
@section('aside')
    @include('mypage.components.sidebar')
@endsection
@section('main')
    @include('mypage.profile.components.profile')
    @include('mypage.profile.components.tabs', ['isPosts' => true, 'isLikes' => false, 'isFollowings' => false, 'isFollowers' => false])
    <div class="common-card">
        @foreach($posts as $post)
            <div class="card common-card-item">
                <img src="https://placehold.jp/214x214.png" class="card-img-top common-card-image" alt="...">
                <div class="card-body">
                    <h5 class="common-card-title">{{ $post->title}}</h5>
                    <p class="common-card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn common-card-button stretched-link">レシピを見る</a>
                </div>
            </div>
        @endforeach
    </div>
    {{-- <nav class="pagination justify-content-center">
        {{ $posts->appends(request()->query())->links() }}
    </nav> --}}
@endsection
