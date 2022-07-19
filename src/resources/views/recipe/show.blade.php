@extends('layouts.app')
@section('header')
    @include('components.header.app')
@endsection
@section('aside')
    @include('recipe.components.sidebar')
@endsection
@section('main')

<div class="card recipe-card">
    <div class="recipe-card-section">
        <div class="recipe-card-button">
            <button type="button" onClick="history.back()" class="btn recipe-card-back">>>戻る</button>
            <recipe-like
                :initial-is-liked-by='@json($recipe->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($recipe->count_likes)'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('recipe.like', ['recipe' => $recipe->id]) }}"
            >
            </recipe-like>
        </div>
        <h2 class="recipe-card-title">{{ $recipe->recipeTitle }}</h2>
        <div class="recipe-card-item">
            <img class="recipe-card-image" src="{{ $recipe->foodImageUrl }}" alt="{{ $recipe->recipeTitle }}">
            <div class="recipe-card-text">
                <p><span>所要時間</span> : {{ $recipe->recipeIndication }}</p>
                <p><span>費用</span> : {{ $recipe->recipeCost }}</p>
                <p><span>投稿者</span> : {{ $recipe->nickname }}</p>
                <p><span>コメント</span> :</p>
                <p>{{ $recipe->recipeDescription }}</p>
            </div>
        </div>
    </div>
    <hr class="recipe-card-separator">
    <h3 class="recipe-card-subheading">材料・調味料</h3>
    <div class="d-grid">
        <a href="{{ $recipe->recipeUrl }}" class="btn recipe-card-link">作り方はこちらから</a>
    </div>
</div>





@endsection
