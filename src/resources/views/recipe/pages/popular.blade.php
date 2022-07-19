@extends('layouts.app')
@section('header')
    @include('components.header.app')
@endsection
@section('aside')
    @include('recipe.components.sidebar')
@endsection
@section('main')
    @include('recipe.components.title')
{{-- ソート --}}
    @include('recipe.components.tabs', ['isNew' => false, 'isPopular' => true,])

{{-- カード --}}
<div class="common-card">
@foreach ($recipes as $key => $recipe)
    <div class="card card-style common-card-item">
        <img src={{ $recipe->foodImageUrl }} class="card-img-top card-style-image common-card-image" alt="...">
        <div class="card-body">
            <h5 class="common-card-title">{{ $recipe->recipeTitle }}</h5>
            <p class="common-card-text">{{ $recipe->recipeDescription }}</p>
            <div class="common-card-like">
                <i class="fas fa-heart common-card-like-icon"></i><p>{{ $recipe->count_likes}}</p>
            </div>
            <div class="d-grid">
                <a href="{{ route('recipe.show', $recipe->id) }}" class="btn common-card-button stretched-link">詳細</a>
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
