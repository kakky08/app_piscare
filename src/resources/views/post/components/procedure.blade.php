<div>
    <h2 class="recipe-register-form-title">作り方の手順</h2>
    <a href="" class="btn">作り方の手順を編集する</a>
</div>
@if (count($post->procedures) !== 0)
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
@endif
<div class="d-grid gap-2 col-6 recipe-register-form-button-layout">
    <a href="{{ route('post.index')}}" class="btn recipe-register-form-button">レシピを登録</a>
</div>
