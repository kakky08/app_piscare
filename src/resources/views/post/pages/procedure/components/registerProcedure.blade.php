<p class="bg-yellow-200 p-2 mb-12 text-gray-700 text-center rounded-xl">手順の新規登録</p>
{{-- @include('post.pages.material.message.registerMaterialError') --}}
<div class="procedure-form">
    {{-- エラーメッセージ --}}
    @include('post.pages.procedure.message.procedureStoreError')

    <form action="{{ route('post.procedure.store')}}" method="POST" id="store-procedure"  enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="postId" value="{{ $post->id }}">
        <procedure-component></procedure-component>
        <button
            type="submit"
            form="store-procedure"
            class="text-white flex-shrink-0 w-full px-4 py-2 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center"
        >
            手順を追加する
        </button>
    </form>
</div>
