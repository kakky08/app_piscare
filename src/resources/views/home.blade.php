@extends('layouts.top')
@section('header')
    @extends('common.navbar.top')
@endsection
@section('main')
<div>
    <section class="text-center mb-32">
        <h1 class="text-8xl mb-12">Piscare</h1>
        <p class="text-2xl mb-12">〜魚食習慣化アプリ〜</p>
        <p class="text-base tracking-widest pb-5 leading-10">魚を食べていますか？<br />
            活が変わり魚を食べることが減ってしまうと思います。<br />
            手軽に食べれる肉や加工食品もいいですが、<br />
            健康やメンタルを良い状態に保つには、魚が欠かせません。<br />
            ぜひこのアプリで、魚を習慣的に食事に取り入れましょう！
        </p>
    </section>
    <a href="{{ route('login')}}" class="block text-center w-96 px-6 py-3 mt-0 mb-48 mx-auto text-gray-800 bg-yellow-300 rounded-md hover:bg-yellow-200 hover:text-gray-600">
        アプリを使ってみる
    </a>
    <section>
        <h2 class="text-center text-gray-800 text-3xl sm:text-4xl font-bold mb-20 sm:mb-12">主な機能</h2>

    {{-- 記録機能 --}}

    <section class="py-6 sm:py-16 lg:py-16 md:w-full">
        <div class="max-w-screen-xl px-4 md:px-8 mx-auto">
            <div class="flex flex-wrap items-center justify-around">
                <div class="md:my-auto md:w-6/12  md:order-2">
                    <h3 class="text-gray-800 text-2xl sm:text-3xl font-bold text-center md:text-left mb-4 md:mb-6">記録機能</h3>
                    <p class="text-gray-500 sm:text-lg mb-6 md:mb-8 text-center">
                        いつ魚を食べたのか記録を残すことができます。<br />
                        一目でわかるので、モチベーションの維持に役立ちます！
                    </p>
                </div>
                <div class="sm:my-0 sm:mx-auto md:w-6/12 my-0 mx-0  md:order-1">
                    <div class="text-center">
                        <img src="{{ asset('images/topimage-record.png') }}" alt="記録機能" class="top-section-image mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- レシピ・お店検索機能 --}}
    <section class="py-6 sm:py-16 lg:py-16 md:w-full">
        <div class="max-w-screen-xl px-4 md:px-8 mx-auto">
            <div class="flex flex-wrap items-center justify-around">
                <div class="md:my-auto md:w-6/12">
                    <h3 class="text-gray-800 text-2xl sm:text-3xl font-bold text-center md:text-left mb-4 md:mb-6">レシピ・お店検索機能</h3>
                    <p class="text-gray-500 sm:text-lg mb-6 md:mb-8 text-center">
                        魚レシピを検索できるのでメニューに困る心配がありません。<br />
                        また、料理をしない人でも魚を食べれるお店を検索できるので、<br />
                        無理なく魚食を続けることができます。
                    </p>
                </div>
                <div class="sm:my-0 sm:mx-auto my-0 mx-0 md:w-6/12">
                    <div class="text-center">
                        <img src="{{ asset('images/topimage-search.png') }}" alt="レシピ・お店検索機能" class="top-section-image mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- オリジナルレシピの閲覧・投稿 --}}


    <section class="pt-6 pb-24 sm:pt-16 sm:pb-40 lg:pt-16 lg:pb-24 md:w-full">
        <div class="max-w-screen-xl px-4 md:px-8 mx-auto">
            <div class="flex flex-wrap items-center justify-around">
                <div class="md:my-auto md:w-6/12  md:order-2">
                    <h3 class="text-gray-800 text-2xl sm:text-3xl font-bold text-center md:text-left mb-4 md:mb-6">オリジナルレシピの閲覧・投稿</h3>
                    <p class="text-gray-500 sm:text-lg mb-6 md:mb-8 text-center">
                        ここでしか見られないオリジナルレシピを検索することができます！<br />
                        また、ご自身のオリジナルレシピを投稿もできるので、<br />
                        レシピ開発してみてはいかがでしょう！？
                    </p>
                </div>
                <div class="sm:my-0 sm:mx-auto md:w-6/12 my-0 mx-0  md:order-1">
                    <div class="text-center">
                        <img src="{{ asset('images/topimage-post.png') }}" alt="オリジナルレシピの閲覧・投稿" class="top-section-image mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <a href="{{ route('login')}}" class="btn top-button">アプリを使ってみる</a> --}}

    <a href="{{ route('login')}}" class="block text-center w-96 px-6 py-3 mt-0 mb-48 mx-auto text-gray-800 bg-yellow-300 rounded-md hover:bg-yellow-200 hover:text-gray-600">
        アプリを使ってみる
    </a>
</div>

@endsection
