<div class="flex mb-12">
    <div class="w-1/12"></div>
    <p class="bg-yellow-200 w-5/12 mr-8 p-2 text-gray-700 text-center rounded-xl">材料の名前</p>
    <p class="bg-yellow-200 w-5/12 mr-8 p-2 text-gray-700 text-center rounded-xl">材料の分量</p>
    <div class="w-1/12"></div>
</div>
@include('post.pages.material.message.updateMaterialError')
<form
    id="edit-material"
    method="POST"
    action="{{ route('post.material.update', ['post' => $post->id])}}"
    class="md:space-y-0 mb-12"
>
    @method('PUT')
    @csrf
    <input
        type="hidden"
        value="{{ $post->id }}"
        name="edit_postId"
    >
    <edit-material
        :post-id={{ $post->id }}
        :materials="{{ json_encode($post->materials) }}"
    >
    </edit-material>
    <button
        type="submit"
        form="edit-material"
        class="text-white flex-shrink-0 w-full px-4 py-2 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center"
    >
        材料についての情報を更新
    </button>
</form>
