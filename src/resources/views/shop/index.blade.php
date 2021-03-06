@extends('layouts.single')
@section('header')
    @include('components.header.app')
@endsection

@section('main')
{{-- タイトル --}}
<h2 class="page-title">お店検索</h2>

{{-- 検索フォーム --}}
@include('shop.message.searchError')
@include('shop.components.form')

{{-- カード --}}
<div class="common-card">
    @foreach ($shops as $shop)
        <div class="card common-card-item">
            <img src="{{ $shop->photo }}" class="card-img-top common-card-image" alt="...">
            <div class="card-body">
                <h5 class="common-card-title">{{ $shop->name }}</h5>
                <p class="common-card-text">{{ $shop->catch }}</p>
                <div class="d-grid">
                    <a href="{{ $shop->url }}" target="_blank" rel="noopener noreferrer" class="btn common-card-button stretched-link">店舗詳細</a>
                </div>
            </div>
        </div>
    @endforeach

</div>
{{-- ページネーション --}}
<nav class="pagination justify-content-center">
    {{ $shops->appends(request()->query())->links() }}
</nav>
@endsection
