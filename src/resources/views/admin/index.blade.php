@extends('layouts.admin')

@section('aside')
    @include('admin.components.sidebar')
@endsection

@section('main')
<!-- フラッシュメッセージ -->
        @if (session('successMessage'))
            <div class="successMessage">
                {{ session('successMessage') }}
            </div>
        @endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Admin You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<a class="btn auth-button" href="{{ route('admin.shop') }}">ショップ登録</a>
{{-- <a class="btn auth-button" href="{{ route('admin.shopsArea') }}">エリア登録</a> --}}
<a class="btn auth-button" href="{{ route('admin.recipe') }}">レシピ登録</a>
<a class="btn auth-button" href="{{ route('admin.category') }}">カテゴリ登録</a>


@endsection
