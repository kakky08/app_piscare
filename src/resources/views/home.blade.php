@extends('layouts.top')

@section('main')
<div class="top-container">
    <section class="top-section">
        <h1 class="top-title">Piscare</h1>
        <p class="top-sub-title">〜魚食習慣化アプリ〜</p>
        <p class="top-section-text">魚を食べていますか？<br />
            活が変わり魚を食べることが減ってしまうと思います。<br />
            手軽に食べれる肉や加工食品もいいですが、<br />
            健康やメンタルを良い状態に保つには、魚が欠かせません。<br />
            ぜひこのアプリで、魚を習慣的に食事に取り入れましょう！
        </p>
    </section>
    <a href="{{route('login')}}" class="btn top-button">アプリを使ってみる</a>
    <section class="top-sub-container">
        <h2 class="top-title-second">主な機能</h2>
        <section class="top-sub-section">
            <div>
                <h3 class="top-title-third">記録機能</h3>
                <p class="top-section-text top-section-text-box">
                    いつ魚を食べたのか記録を残すことができます。<br />
                    一目でわかるので、モチベーションの維持に役立ちます！
                </p>
            </div>
            <img src="{{ asset('images/topimage-record.png') }}" alt="記録機能" class="top-section-image">
        </section>
        <section class="top-sub-section-reverse">
            <div>
                <h3 class="top-title-third">レシピ・お店検索機能</h3>
                <p class="top-section-text top-section-text-box">
                    魚レシピを検索できるのでメニューに困る心配がありません。<br />
                    また、料理をしない人でも魚を食べれるお店を検索できるので、無理なく魚食を続けることができます。
                </p>
            </div>
            <img src="{{ asset('images/topimage-search.png') }}" alt="レシピ・お店検索機能" class="top-section-image">
        </section>
        <section class="top-sub-section">
            <div>
                <h3 class="top-title-third">オリジナルレシピの閲覧・投稿</h3>
                <p class="top-section-text top-section-text-box">
                    ここでしか見られないオリジナルレシピを検索することができます！<br />
                    また、ご自身のオリジナルレシピを投稿もできるので、レシピ開発してみてはいかがでしょう！？
                </p>
            </div>
            <img src="{{ asset('images/topimage-post.png') }}" alt="オリジナルレシピの閲覧・投稿" class="top-section-image">
        </section>
    </section>
    <a href="{{ route('login')}}" class="btn top-button">アプリを使ってみる</a>
</div>

@endsection
