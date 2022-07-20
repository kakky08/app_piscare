<div class="row cols-4 material-register-form-tag">
    <div class="col-1"></div>
    <p class="col">材料の名前</p>
    <p class="col">材料の分量</p>
    <div class="col-1"></div>
</div>
@include('post.pages.material.message.updateMaterialError')

<form method="POST" action="{{ route('post.material.update', ['post' => $postId])}}" id="edit-material">
    @method('PUT')
    @csrf
    <input
        type="hidden"
        value="{{ $postId }}"
        name="edit_postId"
    >
    <edit-material
        :post-id={{ $postId }}
        :materials="{{ json_encode($materials) }}"
    >
    </edit-material>
    <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" class="btn col-auto post-edit-button material-form-button-margin" form="edit-material">材料についての情報を更新する</button>
    </div>
</form>
