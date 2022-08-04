@extends('layouts.app')
@section('header')
    @include('components.header.app', ['page' => 'recipe'])
@endsection
@section('aside')
    @include('recipe.components.sidebar')
@endsection
@section('main')

<div class="card show-card">
    <div class="show-card-section">
        <div class="show-card-button">
            <button type="button" onClick="history.back()" class="btn show-card-back">>>戻る</button>
            <recipe-like
                :initial-is-liked-by='@json($recipe->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($recipe->count_likes)'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('recipe.like', ['recipe' => $recipe->id]) }}"
            >
            </recipe-like>
        </div>
        <h2 class="show-card-title">{{ $recipe->recipeTitle }}</h2>
        <div class="show-card-item">
            <img class="show-card-image" src="{{ $recipe->foodImageUrl }}" alt="{{ $recipe->recipeTitle }}">
            <div class="show-card-text">
                <p><span>所要時間</span> : {{ $recipe->recipeIndication }}</p>
                <p><span>費用</span> : {{ $recipe->recipeCost }}</p>
                <p><span>投稿者</span> : {{ $recipe->nickname }}</p>
                <p><span>コメント</span> :</p>
                <p>{{ $recipe->recipeDescription }}</p>
            </div>
        </div>
    </div>
    <hr class="show-card-separator">
    <h3 class="show-card-subheading">材料・調味料</h3>
        <ul class="show-card-material-list">
            @foreach ($recipe->materials as $material)
                <li class="show-card-material-item">{{ $material->name }}<span class="show-card-material-span">/</span> </li>
            @endforeach
        </ul>
    <div class="d-grid">
        <a href="{{ $recipe->recipeUrl }}" target="_blank" rel="noopener noreferrer" class="btn show-card-link">作り方はこちらから</a>
    </div>
</div>





@endsection
