<form method="GET" action="{{ route('shop.search') }}" class="flex items-center mb-12">
    <input
            type="text"
            name="keyword"
            class="rounded-lg border-transparent appearance-none border border-gray-300 py-2 px-2 mr-5 w-full bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
            placeholder="キーワード"
    />

    <select
        name="area"
        class="block text-gray-700  py-2 px-3 mr-5 w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
    >
        <option selected value="">エリアを選択する</option>
        @foreach ($areas as $area)
            <option value="{{ $area->id }}">
                {{ $area->name }}
            </option>
        @endforeach
    </select>

    <button
        type="submit"
        class="text-white w-28 md:w-52 mx-auto flex-shrink-0 px-4 py-2 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center"
    >
        検索
    </button>

</form>

<hr class="mb-8 bg-gray-400">
