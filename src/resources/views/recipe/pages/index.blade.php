@extends('layouts.app')
@section('header')
    @include('common.navbar.app',  ['page' => 'recipe'])
@endsection
@section('aside')
    @include('common.aside.recipe')
@endsection
@section('main')
    @include('recipe.components.title')
    @include('common.drawer.recipe')
{{-- ソート --}}
    @include('recipe.components.tabs', ['isNew' => true, 'isPopular' => false,])

{{-- カード --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8 mb-24">
        @foreach($recipes as $key => $recipe)
            <div class="mx-auto max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                @if (isset($recipe->foodImageUrl))
                <a href="{{ route('recipe.show', $recipe->id) }}">
                    <img
                        class="rounded-t-lg w-80 2xl:w-96 h-64 object-cover"
                        src="{{ $recipe->foodImageUrl }}"
                        alt="{{ $recipe->recipeTitle }}"
                    />
                </a>
                @else
                <a href="{{ route('recipe.show', $recipe->id) }}">
                    <img
                        class="rounded-t-lg w-80 2xl:w-96 h-64 object-cover hover:opacity-80"
                        src="{{ asset('images/noimage.jpeg') }}"
                        alt="レシピの画像が存在しません。"
                    />
                </a>
                @endif
                <div class="p-5 w-80 2xl:w-96">
                    <a href="{{ route('recipe.show', $recipe->id) }}">
                        <h5 class="mb-3 h-28 text-2xl font-bold tracking-tight text-gray-900 dark:text-white hover:opacity-80">
                            {{ $recipe->recipeTitle }}
                        </h5>
                    </a>
                    <p class="mb-3 h-40 font-normal text-gray-700 dark:text-gray-400">
                        {{ $recipe->recipeDescription }}
                    </p>
                    <div class="common-card-like">
                    <i class="fas fa-heart common-card-like-icon"></i><p>{{ $recipe->count_likes}}</p>
                </div>
                    <a
                        href="{{ route('recipe.show', $recipe->id) }}"
                        class="w-full justify-center inline-flex items-center py-2 px-3 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:opacity-80 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm mt-16 md:px-16 px-8 py-2.5 text-center"
                    >
                        レシピ詳細
                        <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

{{-- ページネーション --}}
<nav class="pagination justify-content-center">
    {{ $recipes->appends(request()->query())->links() }}
</nav>

@endsection
