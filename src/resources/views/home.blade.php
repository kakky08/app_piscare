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
    <a href="{{ route('login')}}" class="block text-center w-96 px-6 py-3 mt-0 mb-48 mx-auto text-gray-600 bg-gradient-to-r from-yellow-200 via-yellow-300 to-yellow-400 rounded-md hover:opacity-80 hover:text-gray-600">
        アプリを使ってみる
    </a>
    <section>
        <h2 class="text-center text-gray-800 text-3xl md:text-4xl font-bold mb-20 md:mb-12">主な機能</h2>
        <div class="p-8">
            <div class="flex items-center flex-col lg:flex-row justify-evenly p-4">
                {{-- 記録機能 --}}
                <section class="p-4 sm:border-b lg:border-0">
                    <div class="text-center mb-4 opacity-90">
                        <img alt="profil"src="{{ asset('images/topimage-record.png') }}" alt="記録機能" class="mx-auto object-cover rounded-full h-96 w-96"/>
                    </div>
                    <div>
                        <h3 class="text-gray-800 text-2xl md:text-3xl font-bold lg:text-left mb-4 lg:mb-6 text-center">記録機能</h3>
                        <p class="text-gray-500 md:text-lg mb-6 lg:mb-8 text-center">
                            いつ魚を食べたのか記録を残すことができます。<br />
                            一目でわかるので、モチベーションの維持に役立ちます！
                        </p>
                    </div>
                </section>
                {{-- レシピ・お店検索機能 --}}
                <section class="p-4 sm:border-b lg:border-0">
                    <div class="text-center mb-4 opacity-90">
                        <img src="{{ asset('images/topimage-search.png') }}" alt="レシピ・お店検索機能" class="mx-auto object-cover rounded-full h-96 w-96"/>
                    </div>
                    <h3 class="text-gray-800 text-2xl md:text-3xl font-bold lg:text-left mb-4 lg:mb-6 text-center">レシピ・お店検索機能</h3>
                    <p class="text-gray-500 md:text-lg mb-6 lg:mb-8 text-center">
                        魚レシピを検索できるのでメニューに困る心配がありません。<br />
                        また、料理をしない人でも魚を食べれるお店を検索できるので、<br />
                        無理なく魚食を続けることができます。
                    </p>
                </section>
                {{-- オリジナルレシピの閲覧・投稿 --}}
                <section class="p-4 sm:border-b lg:border-0">
                    <div class="text-center mb-4 opacity-90">
                        <img src="{{ asset('images/topimage-post.png') }}" alt="オリジナルレシピの閲覧・投稿" class="mx-auto object-cover rounded-full h-96 w-96"/>
                    </div>
                    <h3 class="text-gray-800 text-2xl md:text-3xl font-bold lg:text-left mb-4 lg:mb-6 text-center">オリジナルレシピの閲覧・投稿</h3>
                    <p class="text-gray-500 md:text-lg mb-6 lg:mb-8 text-center">
                        ここでしか見られないオリジナルレシピを検索することができます！<br />
                        また、ご自身のオリジナルレシピを投稿もできるので、<br />
                        レシピ開発してみてはいかがでしょう！？
                    </p>
                </section>
            </div>
        </div>
    </section>

    <a href="{{ route('login')}}" class="block text-center w-96 px-6 py-3 mt-0 mb-48 mx-auto text-gray-600 bg-gradient-to-r from-yellow-200 via-yellow-300 to-yellow-400 rounded-md hover:opacity-80 hover:text-gray-600">
        アプリを使ってみる
    </a>
</div>
@endsection
