<aside class="hidden lg:block relative bg-gray-50">
    <div class="flex flex-col sm:flex-row sm:justify-around">
        <aside class="w-64 w-[calc(100vh - 60px)]">
            <div class="px-4 pt-10 pb-4 sm:px-3">
                <a class="hover:text-gray-800 hover:bg-gray-100 flex items-center p-2 my-6 transition-colors text-gray-600"
                    href="{{ route('home.index') }}"
                >
                    <i class="fas fa-home fa-lg w-5"></i>
                    <span class="mx-4 text-lg font-normal">
                        Home
                    </span>
                    <span class="flex-grow text-right">
                    </span>
                </a>
                <a class="hover:text-gray-800 hover:bg-gray-100 flex items-center p-2 my-6 transition-colors text-gray-600"
                    href="{{ route('record.index') }}"
                >
                    <i class="fas fa-clipboard fa-lg w-5"></i>
                    <span class="mx-4 text-lg font-normal">
                        記録
                    </span>
                    <span class="flex-grow text-right">
                    </span>
                </a>
                <a class="hover:text-gray-800 hover:bg-gray-100 flex items-center p-2 my-6 transition-colors text-gray-600"
                    href="{{ route('post.index') }}"
                >
                    <i class="fas fa-utensils fa-lg w-5"></i>
                    <span class="mx-4 text-lg font-normal">
                        レシピ
                    </span>
                    <span class="flex-grow text-right">
                    </span>
                </a>
                <a class="hover:text-gray-800 hover:bg-gray-100 flex items-center p-2 my-6 transition-colors text-gray-600"
                    href="{{ route('post.create') }}"
                >
                    <i class="fas fa-pen-square fa-lg w-5"></i>
                    <span class="mx-4 text-lg font-normal">
                        投稿
                    </span>
                    <span class="flex-grow text-right">
                    </span>
                </a>
                <a class="hover:text-gray-800 hover:bg-gray-100 flex items-center p-2 my-6 transition-colors text-gray-600"
                    href="{{ route('shop.index') }}"
                >
                    <i class="fas fa-store-alt fa-lg w-5"></i>
                    <span class="mx-4 text-lg font-normal">
                        お店
                    </span>
                    <span class="flex-grow text-right">
                    </span>
                </a>
                {{-- <button
                    class="hover:text-gray-800 hover:bg-gray-100 flex items-center p-2 my-8 transition-colors text-gray-600"
                    @click="togglePagesMenu"
                        aria-haspopup="true"
                >
              <i class="fas fa-user fa-lg w-5"></i>
                    <span class="mx-4 text-lg font-normal">
                        マイページ
                    </span>
                    <span class="flex-grow text-right">
                    </span>
                <svg
                  class="w-4 h-4"
                  aria-hidden="true"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </button> --}}
              {{-- <template v-if="isPagesMenuOpen">
                <ul
                  x-transition:enter="transition-all ease-in-out duration-300"
                  x-transition:enter-start="opacity-25 max-h-0"
                  x-transition:enter-end="opacity-100 max-h-xl"
                  x-transition:leave="transition-all ease-in-out duration-300"
                  x-transition:leave-start="opacity-100 max-h-xl"
                  x-transition:leave-end="opacity-0 max-h-0"
                  class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                  aria-label="submenu"
                >
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full block text-lg font-normal" :href="profilePage">プロフィール</a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full block text-lg font-normal" href="/home">目標設定</a>
                  </li>
                 <!--  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full block text-lg font-normal" href="pages/login.html">目標設定</a>
                  </li> -->
                 <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full block text-lg font-normal" href="/setting">その他設定</a>
                  </li>

                </ul>
              </template> --}}
            {{-- </nav> --}}
            </div>
        </aside>
    </div>
</aside>
