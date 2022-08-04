@extends('layouts.admin')

@section('aside')
    @include('admin.components.sidebar', ['page' => 'registration'])
@endsection

@section('main')
<h1 class="admin-title">管理ページ</h1>
<h2 class="admin-subtitle">レシピカテゴリの登録</h2>
<div class="d-grid">
    <a class="btn admin-button" href="{{ route('admin.category') }}">レシピカテゴリを登録する</a>
</div>
<h2 class="admin-subtitle">レシピの登録</h2>
<div class="d-grid">
    <a class="btn admin-button" href="{{ route('admin.recipe') }}">レシピを登録する</a>
</div>
<h2 class="admin-subtitle">ショップエリアの登録</h2>
<div class="d-grid">
    <a class="btn admin-button" href="{{ route('admin.area') }}">ショップエリアを登録する</a>
</div>
<h2 class="admin-subtitle">ショップの登録</h2>
<div class="d-grid">
    <a class="btn admin-button" href="{{ route('admin.shop') }}">ショップを登録する</a>
</div>

@endsection
