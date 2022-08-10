@include('post.message.descriptionError')
<form id="description-update" method="POST" action="{{ route('post.description.update', ['post' => $post->id])}}">
    @csrf
    @method('PUT')
    <label for="description-textarea" class="form-label">料理コメント</label>
    <textarea name="description" class="form-control" id="description-textarea" rows="5">
        @if (isset($post->description))
            {{ $post->description }}
        @endif
    </textarea>
    <button type="submit" form="description-update">コメントを更新する</button>
</form>
