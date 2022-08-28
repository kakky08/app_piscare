@extends('layouts.app')
@section('header')
        @include('components.header.app', ['page' => 'profile'])
@endsection
@section('aside')
    @include('mypage.components.sidebar', ['page' => 'profile'])
@endsection
@section('main')
    @include('mypage.profile.components.profile')
    @include('mypage.profile.components.tabs', ['isPosts' => true, 'isLikes' => false, 'isFollowings' => false, 'isFollowers' => false])
    <div class="common-card">
        @foreach($user->posts as $post)
            <div class="card common-card-item">
                @if (isset($post->image))
                    <img src="https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/{{ $post->image }}" class="card-img-top common-card-image" alt="{{ $post->title }}">
                @else
                    <img src="{{ asset('images/noimage.jpeg') }}" class="card-img-top common-card-image" alt="イメージが存在しません" style="width: 214px, height:214px">
                @endif
                <div class="card-body">
                    <h5 class="common-card-title">{{ $post->title}}</h5>
                    <p class="common-card-text">{{ $post->description }}</p>
                    <div class="d-grid">
                        <a href="{{ route('post.show', ['id' => $post->id ])}}" class="btn common-card-button stretched-link">レシピを見る</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- <nav class="pagination justify-content-center">
        {{ $posts->appends(request()->query())->links() }}
    </nav> --}}
@endsection
