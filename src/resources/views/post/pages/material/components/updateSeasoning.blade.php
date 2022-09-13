<div class="flex mb-12">
    <div class="w-1/12"></div>
    <p class="bg-yellow-200 w-5/12 mr-8 p-2 text-gray-700 text-center rounded-xl">調味料の名前</p>
    <p class="bg-yellow-200 w-5/12 mr-8 p-2 text-gray-700 text-center rounded-xl">調味料の分量</p>
    <div class="w-1/12"></div>
</div>
@include('post.pages.material.message.updateSeasoningError')
<form
    id="edit-seasoning"
    method="POST"
    action="{{ route('post.seasoning.update')}}"
    class="md:space-y-0 mb-12"
>
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
    <button
        type="submit"
        form="edit-seasoning"
        class="text-white flex-shrink-0 w-full px-4 py-2 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center"
    >
        調味料についての情報を更新
    </button>
</form>
