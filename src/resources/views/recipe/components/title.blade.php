<div class="row justify-content-between col-lg-12">
    {{-- タイトル --}}
    @if (isset($name))
        <h1 class="page-title">{{ $name }}</h1>
    @else
        <h1 class="page-title">レシピ</h1>
    @endif
</div>
