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

            </div>
        </aside>
    </div>
</aside>
