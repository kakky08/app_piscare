@extends('layouts.single')
@section('header')
    @include('common.navbar.app',  ['page' => 'post'])
@endsection
@section('main')
    <div class="card">
        <div class="card-body recipe-form-body">
            @include('post.message.successMessage')
            <form  id="title-update" class="title-update-form" method="POST" action="">
                <div class="common-input">
                    <label class="common-input-label">
                        <input type="text" placeholder="料理名を入力してください" value="{{ $post->title }}" class="title-update-input">
                    </label>
                </div>
                <button type="submit" form="title-update" class="btn post-edit-button title-update-button">料理名を更新する</button>
            </form>
            {{-- post Id のインプット --}}
            {{-- <input type="hidden" name="postId" value="{{ $post->id }}"> --}}
            <div class="row row-cols-2 spacing-reset align-items-center recipe-form recipe-form-section border-bottom">
                {{-- 料理画像 --}}
                @include('post.message.mainImageError')
                <form method="POST" action="{{ route('post.mainImage.update', ['post' => $post->id])}}"  id="main-image-update" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="recipe-flex-column">
                        <main-image
                            :image={{ json_encode( $post->image) }}
                        >
                        </main-image>
                        <button type="submit" form="main-image-update" class="btn post-edit-button">画像を更新する</button>
                    </div>
                </form>
                {{-- コメント --}}
                    @include('post.components.description')
                </div>
                {{-- 材料リスト --}}
                    @include('post.components.material')
                {{-- 手順リスト --}}
                    @include('post.components.procedure')
            </div>
        </div>
    </div>
@endsection
