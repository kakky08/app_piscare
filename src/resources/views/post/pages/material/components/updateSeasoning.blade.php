<div class="row cols-4 material-register-form-tag">
    <div class="col-1"></div>
    <p class="col">調味料の名前</p>
    <p class="col">調味料の分量</p>
    <div class="col-1"></div>
</div>
@include('post.pages.material.message.updateSeasoningError')

<form method="POST" action="{{ route('post.seasoning.update')}}" id="edit-seasoning">
    @method('PUT')
    @csrf
    <input
        type="hidden"
        value="{{ $post->id }}"
        name="edit_postId"
    >
    <edit-seasoning
        :post-id={{ $post->id }}
        :seasonings="{{ json_encode($post->seasonings) }}"
    >
    </edit-seasoning>
    <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" class="btn col-auto post-edit-button material-form-button-margin" form="edit-seasoning">調味料についての情報を更新する</button>
    </div>
</form>
