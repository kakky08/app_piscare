<aside class="hidden lg:block relative bg-gray-50 dark:bg-gray-800">
    <div class="flex flex-col sm:flex-row sm:justify-around">
        <div class="w-96 h-screen">
            <nav class="mt-20 px-6 ">
                <a class="{{  $page === 'home' ? 'border-r-2 border-yellow-300 bg-gray-100': '' }} hover:text-gray-800 hover:bg-gray-100 flex items-center p-2 my-6 transition-colors text-gray-600"
                    href="{{ route('home.index') }}"
                >
                    <i class="fas fa-home fa-lg"></i>
                    <span class="mx-4 text-lg font-normal">
                        Home
                    </span>
                    <span class="flex-grow text-right">
                    </span>
                </a>
                <a class="{{  $page === 'profile' ? 'border-r-2 border-yellow-300 bg-gray-100': '' }} hover:text-gray-800 hover:bg-gray-100 flex items-center p-2 my-6 transition-colors text-gray-800"
                    href="{{ route('profile.show', ['name' => $user->name]) }}"
                >
                    <i class="fas fa-user fa-lg"></i>
                    <span class="mx-4 text-lg font-normal">
                        Profile
                    </span>
                    <span class="flex-grow text-right">
                    </span>
                </a>
                <a class="{{  $page === 'setting' ? 'border-r-2 border-yellow-300 bg-gray-100': '' }} hover:text-gray-800 hover:bg-gray-100 flex items-center p-2 my-6 transition-colors text-gray-600"
                    href="{{ route('setting.index') }}"
                >
                    <i class="fas fa-cog fa-lg"></i>
                    <span class="mx-4 text-lg font-normal">
                        Setting
                    </span>
                </a>
            </nav>
        </div>
    </div>
</aside>
