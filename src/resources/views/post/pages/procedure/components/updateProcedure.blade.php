<form method="POST" action="{{ route('post.procedure.update', ['post' => $postId ])}}" id="update-procedure">
    @method('PUT')
    @csrf
    <input type="hidden" name="edit_postId" value="{{ $postId }}">
    <edit-procedure
        :post-id={{ $postId }}
        :procedures="{{ json_encode($procedures) }}"
        path="{{ $path }}"
    >
    </edit-procedure>
    @foreach ($procedures as $procedure)
        {{-- {{dd($procedure->photo)}} --}}
        <img src="{{$procedure->photo}}" alt="">
    @endforeach
    <p class="border-bottom mb-4"></p>
    <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" class="btn btn-success col-auto" form="update-procedure">保存して閉じる</button>
    </div>
</form>
