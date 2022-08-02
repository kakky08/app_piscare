<form method="POST" action="{{ route('post.procedure.update', ['post' => $post->id ])}}" id="update-procedure">
    @method('PUT')
    @csrf
    <input type="hidden" name="edit_postId" value="{{ $post->id }}">
    <edit-procedure
        :post-id={{ $post->id }}
        :procedures="{{ json_encode($post->procedures) }}"
        {{-- path="{{ $path }}" --}}
    >
    </edit-procedure>
    <p class="border-bottom mb-4"></p>
    <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" class="btn btn-success col-auto" form="update-procedure">手順についての情報を更新する</button>
    </div>
</form>
