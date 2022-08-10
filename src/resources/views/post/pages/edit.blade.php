@extends('layouts.single')
@section('header')
    @include('components.header.app',  ['page' => 'post'])
@endsection
@section('main')
    <div class="card">
        <div class="card-body recipe-register-form-body">
            @include('post.message.successMessage')
            <form  id="title-update" class="title-update-form" method="POST" action="">
                <div class="common-input">
                    <label class="common-input-label">
                        <input type="text" placeholder="料理名を入力してください" value="{{ $post->title }}">
                    </label>
                </div>
                <button type="submit" form="title-update" class="btn post-edit-button">料理名を更新する</button>
            </form>
            {{-- post Id のインプット --}}
            {{-- <input type="hidden" name="postId" value="{{ $post->id }}"> --}}
            <div class="row row-cols-2 spacing-reset recipe-register-form-section border-bottom">
                {{-- 料理画像 --}}
                @include('post.message.mainImageError')
                <form method="POST" action="{{ route('post.mainImage.update', ['post' => $post->id])}}"  id="main-image-update" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <main-image
                        :image={{ json_encode( $post->image) }}
                    >
                    </main-image>
                    <button type="submit" form="main-image-update" class="btn">画像を更新する</button>
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
