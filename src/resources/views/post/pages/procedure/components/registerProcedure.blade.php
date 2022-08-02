<div class="row cols-3 material-register-form-tag">
    <div class="col-1"></div>
    <p class="col">手順の新規登録</p>
    <div class="col-1"></div>
</div>
{{-- @include('post.pages.material.message.registerMaterialError') --}}
<div class="procedure-form">
    <form action="{{ route('post.procedure.store')}}" method="POST" id="store-procedure"  enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="postId" value="{{ $post->id }}">
        <procedure-component></procedure-component>
        <div class="d-grid col-6 mx-auto">
            <button type="submit" class="btn procedure-button" form="store-procedure">手順を追加する</button>
        </div>
    </form>
</div>
