@extends('layouts.single')
@section('header')
    @include('components.header.app')
@endsection
@section('main')
    @include('post.components.title')
    @include('post.components.tabs', ['isNew' => false, 'isPopular' => true,])

    {{-- カード --}}
    <div class="common-card">
        @foreach ($recipes as $recipe)
        <div class="card common-card-item">
            <img src="https://placehold.jp/214x214.png" class="card-img-top common-card-image" alt="{{ $recipe->user->name }}が投稿したレシピの画像">
            <div class="card-body">
                <h5 class="common-card-title">{{ $recipe->user->name }}</h5>
                <p class="common-card-text">{{ $recipe->people }}</p>
                <p></p>
                <div class="common-card-like">
                    <i class="fas fa-heart common-card-like-icon"></i><p>{{ $recipe->count_likes}}</p>
                    {{-- <post-like
                        :initial-is-liked-by='@json($recipe->isLikedBy(Auth::user()))'
                        :initial-count-likes='@json($recipe->count_likes)'
                        :authorized='@json(Auth::check())'
                        endpoint="{{ route('post.like', ['post' => $recipe->id]) }}"
                    >
                    </post-like> --}}
                </div>
                <div class="d-grid">
                    <a href="{{ route('post.show', ['id' => $recipe->id ])}}" class="btn common-card-button stretched-link">詳細</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- ページネーション --}}
    <nav class="pagination justify-content-center">
        {{ $recipes->appends(request()->query())->links() }}
    </nav>
@endsection
