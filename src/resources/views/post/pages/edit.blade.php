@extends('layouts.single')
@section('header')
    @include('components.header.app',  ['page' => 'post'])
@endsection
@section('main')
    <div class="card">
        <div class="card-body recipe-register-form-body">
            <h2 class="recipe-register-form-title">{{ $post->title }}</h2>
            {{-- post Id のインプット --}}
            <input type="hidden" name="postId" value="{{ $post->id }}">
            <div class="row row-cols-2 spacing-reset recipe-register-form-section border-bottom">
                {{-- 料理画像 --}}
                <div class="col spacing-reset">
                    <img src="https://placehold.jp/298x447.png" alt="" class="recipe-register-form-image">
                </div>
                //TODO rootを設定と処理の追加
                <form method="POST" action="{{ route('post.mainImage.update', ['post' => $post->id])}}"  id="main-image-update" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <main-image
                        :image={{ json_encode( $post->image) }}
                    >
                    </main-image>
                    <button type="submit" form="main-image-update" class="btn">画像を変更</button>
                </form>

                {{-- 材料リスト --}}
                <div class="col spacing-reset">
                    <a href="{{ route('post.material.show', ['post' => $post->id])}}">
                        <div class="recipe-register-form-link">
                            @if (count($post->materials) !== 0)
                                    <h3 class="recipe-register-form-material">
                                        材料名
                                        @if (empty($post->people))
                                            <small class="recipe-register-form-people">（人分）</small>
                                        @else
                                            <small class="recipe-register-form-people">（{{ $post->people }}人分）</small>
                                        @endif
                                    </h3>
                                    <ul>
                                        @foreach ($post->materials as $material)
                                            <li class="row row-cols-2 border-bottom recipe-register-form-material-list">
                                                    <h4 class="col recipe-register-form-material-name">{{ $material->name }}</h4>
                                                    <p class="col recipe-register-form-material-quantity">{{ $material->quantity }}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                                <h3 class="recipe-register-form-material">
                                    材料名
                                    <small class="recipe-register-form-people">（人分）</small>
                                </h3>
                                <ul>
                                    @for ($i = 1; $i < 4; $i++)
                                        <li class="row row-cols-2 spacing-reset border-bottom recipe-register-form-material-list">
                                                <h4 class="col">材料の名前{{ $i }}</h4>
                                                <p class="col">材料の分量</p>
                                        </li>
                                    @endfor
                                </ul>
                            @endif
                            @if (count($post->seasonings) !== 0)
                                <h3 class="recipe-register-form-material">◼️調味料</h3>
                                <ul>
                                    @foreach ($post->seasonings as $seasoning)
                                        <li class="row row-cols-2 border-bottom recipe-register-form-material-list">
                                                <h4 class="col recipe-register-form-material-name">{{ $seasoning->name }}</h4>
                                                <p class="col recipe-register-form-material-quantity">{{ $seasoning->quantity }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <h3 class="recipe-register-form-material">◼️調味料</h3>
                                <ul>
                                    @for ($j = 1; $j < 3; $j++)
                                        <li class="row row-cols-2 spacing-reset border-bottom recipe-register-form-material-list">
                                                <h4 class="col">調味料の名前{{ $j }}</h4>
                                                <p class="col">調味料の分量</p>
                                        </li>
                                    @endfor
                                </ul>
                            @endif
                        </div>
                    </a>
                </div>
            </div>

            <h2 class="recipe-register-form-title">作り方</h2>
            @if (count($post->procedures) !== 0)
                <a href="{{ route('post.procedure.show', ['post' => $post->id])}}">編集する</a>
                @foreach ($post->procedures as $procedure)
                    <div class="row cols-3 spacing-reset recipe-register-form-section recipe-register-form-link border-bottom">
                        <p class="col-1 spacing-reset recipe-register-form-order">{{ $procedure->order . '.'}}</p>
                        <div class="col spacing-reset">
                            <img src="{{ $procedure->photo }}" alt="" class="recipe-register-form-procedure-image">
                        </div>
                        <div class="col spacing-reset">
                            <p class="form-label recipe-register-form-label">作り方の説明</p>
                            <div class="form-control spacing-reset recipe-register-form-explanation">{{ $procedure->procedure }}</div>
                        </div>
                    </div>
                @endforeach
            @else
                <a href="{{ route('post.procedure.show', ['post' => $post->id])}}">
                    <div class="row cols-3 spacing-reset recipe-register-form-section recipe-register-form-link border-bottom">
                        <p class="col-1 spacing-reset recipe-register-form-order">1.</p>
                        {{-- 料理画像 --}}
                        <div class="col spacing-reset">
                            <img src="https://placehold.jp/144x144.png" alt="" class="recipe-register-form-procedure-image">
                        </div>
                        {{-- 作り方の説明 --}}
                        <div class="col spacing-reset">
                            <p class="form-label recipe-register-form-label">作り方の説明</p>
                            <div class="form-control spacing-reset recipe-register-form-explanation"></div>
                        </div>
                    </div>
                </a>
            @endif
            <div class="d-grid gap-2 col-6 recipe-register-form-button-layout">
                <a href="{{ route('post.index')}}" class="btn recipe-register-form-button">レシピを登録</a>
            </div>
        </div>
    </div>
@endsection
