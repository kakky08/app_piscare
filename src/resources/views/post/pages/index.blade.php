@extends('layouts.single')
@section('header')
    @include('components.header.app',  ['page' => 'post'])
@endsection
@section('main')
    @include('post.components.title')
    @include('post.components.tabs', ['isNew' => true, 'isPopular' => false,])

    {{-- カード --}}
    <div class="common-card">
        @foreach ($recipes as $recipe)
        <div class="card common-card-item">
            @if($recipe->image)
                <img src="https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/{{ $recipe->image }}" class="card-img-top common-card-image" alt="{{ $recipe->user->name }}が投稿したレシピの画像">
            @else
                <img src="https://placehold.jp/214x214.png" class="card-img-top common-card-image" alt="レシピの画像が存在しません。">
            @endif
            <div class="card-body">
                <h5 class="common-card-title">{{ $recipe->title }}</h5>
                <p class="common-card-text">{{ $recipe->description }}</p>
                <p></p>
                <div class="common-card-like">
                    <i class="fas fa-heart common-card-like-icon"></i><p>{{ $recipe->count_likes}}</p>
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
