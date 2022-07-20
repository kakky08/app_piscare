@extends('layouts.single')
@section('header')
    @include('components.header.app')
@endsection
@section('main')

<div class="card show-card post-show-card">
    <div class="show-card-section">
        <div class="show-card-button">
            <button type="button" onClick="history.back()" class="btn show-card-back">>>戻る</button>
            <div class="show-card-button-action">
                <post-like
                    :initial-is-liked-by='@json($recipe->isLikedBy(Auth::user()))'
                    :initial-count-likes='@json($recipe->count_likes)'
                    :authorized='@json(Auth::check())'
                    endpoint="{{ route('recipe.like', ['recipe' => $recipe->id]) }}"
                >
                </post-like>
                <p>{{$recipe->user->isFollowedBy(Auth::user())}}</p>
                @if(Auth::id() !== $recipe->user_id)
                    <follow-button
                        class="ml-auto show-card-button-follow"
                        :initial-is-followed-by='@json($recipe->user->isFollowedBy(Auth::user()))'
                        :authorized='@json(Auth::check())'
                        endpoint='{{ route('user.follow', ['id' => $recipe->user_id]) }}'
                    >
                    </follow-button>
                @endif
            </div>
        </div>
        <h2 class="show-card-title">{{ $recipe->title }}</h2>
        <div class="show-card-item">
            @if (isset($recipe->image))
                <img class="show-card-image" src="{{ $recipe->image }}" alt="{{ $recipe->title }}の料理画像">
            @else
                <img class="show-card-image" src="https://placehold.jp/360x360.png" alt="イメージ画像はありません">
            @endif
            <div class="show-card-text">
                {{--  <p><span>所要時間</span> : {{ $recipe->recipeIndication }}</p>
                <p><span>費用</span> : {{ $recipe->recipeCost }}</p> --}}
                <p><span>投稿者</span> : <a href="{{ route('information.show', ['name' => $recipe->user->name ])}}">{{ $recipe->user->name }}</a></p>
                {{-- <p><span>コメント</span> :</p>
                <p>{{ $recipe->recipeDescription }}</p> --}}
            </div>
        </div>
    </div>
    <hr class="show-card-separator">
    <h3 class="show-card-subheading">材料 <span>{{$recipe->people}}人前</span></h3>
        @if (isset($materials))
            <ul>
                @foreach ($materials as $material)
                    <li>
                        <ul>
                            <li>{{ $material->name }}</li>
                            <li>{{ $material->quantity }}</li>
                        </ul>
                    </li>
                @endforeach
            </ul>
        @endif
    <h3 class="show-card-subheading">調味料</h3>
        @if (isset($seasonings))
            <ul>
                @foreach ($seasonings as $seasoning)
                    <li>
                        <ul>
                            <li>{{ $seasoning->name }}</li>
                            <li>{{ $seasoning->quantity }}</li>
                        </ul>
                    </li>
                @endforeach
            </ul>
        @endif
    <hr class="show-card-separator">
    <h3 class="show-card-subheading">手順</h3>
        @if (isset($procedures))
            <ul>
                @foreach ($procedures as $procedure)
                    <li>
                        <ul>
                            @if (isset($procedure->photo))
                                <li><img src="{{ $procedure->photo }}" alt="手順{{ $procedure->order }}の画像"></li>
                            @else
                                <li><img src="https://placehold.jp/200x200.png" alt="手順の画像はありません"></li>
                            @endif
                            <li>{{ $procedure->procedure }}</li>
                        </ul>
                    </li>
                @endforeach
            </ul>
        @endif
    {{-- <div class="d-grid">
        <a href="{{ $recipe->recipeUrl }}" class="btn show-card-link">作り方はこちらから</a>
    </div> --}}
</div>





@endsection
