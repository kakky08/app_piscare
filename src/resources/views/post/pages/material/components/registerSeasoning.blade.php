<div class="row cols-3 material-register-form-tag">
    <div class="col-1"></div>
    <p class="col">調味料の新規登録</p>
    <div class="col-1"></div>
</div>
@include('post.pages.material.message.registerSeasoningError')
<form method="POST" action="{{ route('post.seasoning.store') }}" id="store-seasoning">
    @csrf
    <div class="material">
        <div class="row cols-4 spacing-reset material-form">
            <div class="col-1"></div>
            <input
                type="hidden"
                value={{ $postId }}
                name="store_postId">
            <input
                type="text"
                class="form-control col"
                placeholder="調味料の名前を入力してください"
                name="store_seasoning"
            >
            <input
                type="text"
                class="form-control col"
                placeholder="調味料の分量を入力してください"
                name="store_seasoning_quantity"
            >
            <button type="submit" form="store-seasoning" class="btn col-1 post-edit-button">調味料を登録</button>
        </div>
    </div>
</form>
