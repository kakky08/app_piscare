<form id="description-update" class="w-3/4 md:w-2/4" method="POST" action="{{ route('post.description.update', ['post' => $post->id])}}">
    @csrf
    @method('PUT')
    <h2 class="mb-8 text-3xl">料理コメント</h2>
    <div>
        @include('post.message.descriptionError')
        <textarea id="description-textarea"rows="6" name="description"class="block p-2.5 mb-8 w-full text-sm text-gray-900 bg-white rounded-md border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="料理コメントは100文字以内で入力してください。">@if (isset($post->description)){{ $post->description }}@endif</textarea>
        <button
            type="submit"
            form="description-update"
            class="w-full justify-center inline-flex items-center py-2 px-3 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:opacity-80 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm md:px-16 px-8 py-2.5 text-center"
        >
            コメントを更新する
        </button>
    </div>
</form>
