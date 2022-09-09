<nav class="px-4 my-auto bg-yellow-300">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="#" class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap">Piscare</span>
        </a>
        <button
            data-collapse-toggle="navbar-multi-level"
            type="button"
            class="inline-flex justify-center items-center ml-3 text-gray-400 rounded-lg md:hidden hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300"
            aria-controls="navbar-multi-level"
            aria-expanded="false"
        >
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
            <ul class="flex flex-col p-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0">
                <li>
                    <a
                        href="{{ route('recipe.index') }}"
                        class="{{  $page === 'recipe' ? 'text-white' : 'text-gray-700' }} block py-2 pr-4 pl-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0"
                    >
                        レシピ検索
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('post.index') }}"
                        class="{{  $page === 'post' ? 'text-white' : 'text-gray-700' }} block py-2 pr-4 pl-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0"
                    >
                        投稿レシピ
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('shop.index') }}"
                        class="{{  $page === 'shop' ? 'text-white' : 'text-gray-700' }} block py-2 pr-4 pl-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0"
                    >
                        お店検索
                    </a>
                </li>
                <li>
                    <button
                        id="dropdownNavbarLink"
                        data-dropdown-toggle="dropdownNavbar"
                        class="flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0 md:w-auto"
                    >
                        {{ $user->name }}
                        <svg class="ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="hidden z-10 w-44 font-normal bg-white rounded divide-y divide-gray-100 shadow">
                        <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="#" class="block py-4 px-4 hover:bg-gray-100 hover:text-gray-800">
                                    マイページ
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block py-4 px-4 hover:bg-gray-100 hover:text-gray-800">
                                    レシピ投稿
                                </a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="#" class="block py-4 px-4 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-800">
                                Sign out
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
