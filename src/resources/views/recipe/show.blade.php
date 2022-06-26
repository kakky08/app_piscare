@extends('layouts.app')
@section('header')
    @include('components.header.app')
@endsection
@section('aside')
    @include('recipe.components.sidebar')
@endsection
@section('main')
<div class="row justify-content-between col-lg-12">
    <button type="button" onClick="history.back()">戻る</button>
    {{-- タイトル --}}
    <h2 class="h2 col-10 mb-0">{{ $recipe->recipeTitle }}</h2>
    <img src="{{ $recipe->foodImageUrl }}" alt="{{ $recipe->recipeTitle }}">
    <p>投稿者 ： {{ $recipe->contributor }}</p>
    <p>所要時間 : {{ $recipe->recipeIndication }}</p>
    <p>費用 ： {{ $recipe->recipeCost }}</p>
    <p>材料・調味料</p>
    <ul>
        {{-- @foreach ($materials as $material)
            <li>{{ $material->name }}</li>
        @endforeach --}}
    </ul>
</div>


{{-- <recipe-like
    :initial-is-liked-by='@json($recipe->isLikedBy(Auth::user()))'
    :initial-count-likes='@json($recipe->count_likes)'
    :authorized='@json(Auth::check())'
    endpoint="{{ route('recipe.like', ['recipe' => $recipe->id]) }}"
>
</recipe-like> --}}

<a href="{{ $recipe->recipeUrl }}" class="btn btn-danger">作り方はこちらから</a>
@endsection
