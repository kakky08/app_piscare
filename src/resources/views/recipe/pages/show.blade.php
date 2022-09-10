@extends('layouts.single')
@section('header')
    @include('common.navbar.app', ['page' => 'recipe'])
@endsection
@section('aside')
    @include('common.aside.recipe')
@endsection
@section('main')
<div class="p-12 relative flex flex-col min-w-0 bg-white bg-clip-border border border-solid border-gray-300 rounded">
    <div class="mb-8">
        <div class="show-card-button">
            <button
        type="button" onClick="history.back()"
        class="w-32 md:w-20 justify-center inline-flex items-center py-2 px-3 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:opacity-80 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm md:px-16 px-8 py-2.5 text-center"
    >
        <svg class="mr-2 -ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        戻る
    </button>
            <recipe-like
                :initial-is-liked-by='@json($recipe->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($recipe->count_likes)'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('recipe.like', ['recipe' => $recipe->id]) }}"
            >
            </recipe-like>
        </div>
        <h2 class="mb-8 text-4xl">{{ $recipe->recipeTitle }}</h2>
        <div class="flex md:justify-around items-center mb-8 flex-wrap">
            <img class="max-w-md object-cover bg-center " src="{{ $recipe->foodImageUrl }}" alt="{{ $recipe->recipeTitle }}">
            <div class="p-8">
                <p class="text-xl mb-12"><span class="font-bold">所要時間</span> : {{ $recipe->recipeIndication }}</p>
                <p class="text-xl mb-12"><span class="font-bold">費用</span> : {{ $recipe->recipeCost }}</p>
                <p class="text-xl mb-12"><span class="font-bold">投稿者</span> : {{ $recipe->nickname }}</p>
                <p class="text-xl mb-12"><span class="font-bold">コメント</span> :</p>
                <p class="text-xl ml-4 max-w-sm">{{ $recipe->recipeDescription }}</p>
            </div>
        </div>
    </div>
    <hr class="mb-12 bg-gray-400">
    <h3 class="text-3xl mb-8">材料・調味料</h3>
        <ul class="show-card-material-list flex flex-wrap mb-16">
            @foreach ($recipe->materials as $material)
                <li class="list-none ml-8 text-xl">{{ $material->name }}<span class="pl-8 text-gray-400">/</span> </li>
            @endforeach
        </ul>
    <a
        href="{{ $recipe->recipeUrl }}"
        class="w-full justify-center inline-flex items-center py-2 px-3 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:opacity-80 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm md:px-16 px-8 py-2.5 text-center"
    >
        作り方はこちらから
        <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
    </a>
</div>
@endsection
