@foreach ($post->procedures as $key => $procedure)
    <div class="material">
        <p class="border-bottom boundary-line">{{ $procedure->order + 1 }}</p>
        <form method="POST" action="{{ route('post.procedure.update')}}" id="update-procedure-{{ $key }}"  enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="hidden" name="procedure" value="{{ $procedure->id }}">
            <update-procedure
                :procedure="{{ json_encode($procedure) }}"
            >
            </update-procedure>
        </form>
        <div>
            <button form="update-procedure-{{ $key }}" type="submit" class="btn col-1 material-form-button">更新</button>
            <form method="POST" action="{{ route('post.procedure.destroy')}}" id="delete-procedure-{{ $key }}">
                @csrf
                @method('DELETE')
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="hidden" name="procedure" value="{{ $procedure->id }}">
                <button form="delete-procedure-{{ $key }}" type="submit" class="btn col-1 material-form-button">削除</button>
            </form>
        </div>
    </div>

@endforeach
<p class="border-bottom mb-4"></p>
<div class="d-grid gap-2 col-6 mx-auto">
    <button type="submit" class="btn btn-success col-auto" form="update-procedure">手順についての情報を更新する</button>
</div>

<form method="POST" action="{{ route('post.procedure.sort')}}" id="sort-procedure">
    @method('PUT')
    @csrf
    <input
        type="hidden"
        value="{{ $post->id }}"
        name="post_id"
    >
    <sort-procedure
        :post-id={{ $post->id }}
        :procedures="{{ json_encode($post->procedures) }}"
    >
    </sort-procedure>
    <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" class="btn col-auto post-edit-button material-form-button-margin" form="sort-procedure">手順の順番を更新する</button>
    </div>
</form>
