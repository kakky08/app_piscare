<aside class="hidden lg:block relative bg-gray-50 dark:bg-gray-800">
    <div class="flex flex-col sm:flex-row sm:justify-around">
        <div class="w-96 h-screen">
            <nav class="mt-20 px-6 ">
                @if($errors->has('keyword'))
                    <p class="alert-message-error">※{{ $errors->first('keyword') }}</p>
                @endif
                <form method="GET" id="search-recipes" action="{{ route('recipe.search')}}" class="flex items-center mb-10">
                    <div class="relative mr-3 w-full">
                        <input
                        type="text"
                        name="keyword"
                        class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-2 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        placeholder="キーワードを入力してください"
                        />
                    </div>
                    <button
                    type="submit"
                    form="search-recipes"
                    class="text-white flex-shrink-0 px-4 py-2 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center"
                    >
                        検索
                    </button>
                </form>

                @foreach ($categories as $category)
                <button
                    type="button"
                    class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="{{ 'category' . $category->id}}"
                    data-collapse-toggle="{{ 'category' . $category->id}}"
                >
                    <span class="flex-1 text-left whitespace-nowrap">{{ $category->categoryName }}</span>
                    <svg
                        class="w-6 h-6"
                        fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        >
                        </path>
                    </svg>
                </button>
                <ul id="{{ 'category' . $category->id}}" class="hidden py-2 space-y-2">
                    <li class="ml-3">
                        <a
                            href="{{ route('recipe.category', ['id' => $category->parentCategoryId . $category->id, 'name' => $category->categoryName . '一覧'] )}}"
                            class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        >
                            {{ $category->categoryName . '一覧'}}
                        </a>
                    </li>
                    @foreach ($category->subCategories as $subCategory)
                        @if ($category->id === $subCategory->category_id &&
                                $category->categoryName !== $subCategory->categoryName)
                            <li class="ml-3">
                                <a
                                    href="{{ route('recipe.category', ['id' => $category->parentCategoryId . $category->id . $subCategory->id, 'name' => $subCategory->categoryName] )}}"
                                    class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                >
                                    {{ $subCategory->categoryName }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                    {{-- <li>
                        <a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Invoice</a>
                    </li> --}}
                </ul>
                @endforeach
            </nav>
        </div>
    </div>
</aside>
