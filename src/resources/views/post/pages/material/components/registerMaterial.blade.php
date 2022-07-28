<div class="row cols-3 material-register-form-tag">
    <div class="col-1"></div>
    <p class="col">材料の新規登録</p>
    <div class="col-1"></div>
</div>
@include('post.pages.material.message.registerMaterialError')
<form method="POST" action="{{ route('post.material.store') }}" id="store-material">
    @csrf
    <div class="material">
        <div class="row cols-4 spacing-reset material-form">
            <div class="col-1"></div>
            <input
                type="hidden"
                value={{ $post->id }}
                name="store_postId">
            <input
                type="text"
                class="form-control col"
                placeholder="材料の名前を入力してください"
                name="store_material"
            >
            <input
                type="text"
                class="form-control col"
                placeholder="材料の分量を入力してください"
                name="store_material_quantity"
            >
            <button type="submit" form="store-material" class="btn col-1 post-edit-button">材料を登録</button>
        </div>
    </div>
</form>
