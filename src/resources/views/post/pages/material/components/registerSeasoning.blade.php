<p class="bg-yellow-200 p-2 mb-12 text-gray-700 text-center rounded-xl">調味料の新規登録</p>
@include('post.pages.material.message.registerSeasoningError')
<form
    id="store-seasoning"
    method="POST"
    action="{{ route('post.seasoning.store') }}"
    class="flex md:flex-row md:space-y-0 mb-12"
>
    @csrf
    <input
        type="hidden"
        value={{ $post->id }}
        name="store_postId"
    >
    <input
        type="text"
        name="store_seasoning"
        class="rounded-lg border flex-1 w-5/12 appearance-none border border-gray-300 mr-8 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
        placeholder="調味料の名前を入力してください"
    />
    <input
        type="text"
        name="store_seasoning_quantity"
        class="rounded-lg border flex-1 w-5/12 appearance-none border border-gray-300 mr-8 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
        placeholder="調味料の分量を入力してください"
    />
    <button
        type="submit"
        form="store-seasoning"
        class="text-white flex-shrink-0 w-2/12 px-4 py-2 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center"
        >
        登録
    </button>
</form>
