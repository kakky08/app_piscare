@extends('layouts.single')
@section('header')
    @include('components.header.app')
@endsection

@section('main')
{{-- タイトル --}}
<h2 class="page-title">お店検索</h2>

{{-- 検索フォーム --}}
{{-- @if($errors->has('keyword'))
    <div class="row cols-3 spacing-reset">
        <p class="col alert-message-error">※{{ $errors->first('keyword') }}</p>
    </div>
@endif
@if($errors->has('area'))
    <div class="row cols-3 spacing-reset">
        <p class="col alert-message-error">※{{ $errors->first('area') }}</p>
    </div>
@endif --}}
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
                    <a href="{{ $shop->url }}" class="btn  common-card-button stretched-link">店舗詳細</a>
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
