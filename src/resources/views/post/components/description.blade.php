@include('post.message.descriptionError')
<form id="description-update" method="POST" action="{{ route('post.description.update', ['post' => $post->id])}}">
    @csrf
    @method('PUT')
    <h2 class="recipe-form-title">料理コメント</h2>
    <div class="recipe-flex-column">
        <textarea name="description" class="form-control" id="description-textarea" rows="5">
            @if (isset($post->description))
                {{ $post->description }}
            @endif
        </textarea>
        <button type="submit" form="description-update" class="btn post-edit-button">コメントを更新する</button>
    </div>
</form>
