<p class="bg-yellow-200 p-2 mb-12 text-gray-700 text-center rounded-xl">何人分の材料か登録</p>
@include('post.pages.material.message.registerPeopleError')
<form
    id="number-of-people-register-form"
    method="POST"
    action="{{ route('post.people.store') }}"
    class="flex md:flex-row md:space-y-0 mb-12"
>
    @csrf
    <input
            type="hidden"
            name="post_id"
            value="{{ $post->id }}"
        >
    <input
        type="hidden"
        name="user"
        value="{{ $user->id }}"
    >
    <input
        type="text"
        name="people"
        value={{ $post->people }}
        class="rounded-lg border flex-1 appearance-none border border-gray-300 w-5/6 mr-8 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
        placeholder="何人分か入力してください"
    />
    <button
        type="submit"
        form="number-of-people-register-form"
        class="text-white flex-shrink-0 w-1/6 px-4 py-2 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center"
    >
        変更
    </button>
</form>
