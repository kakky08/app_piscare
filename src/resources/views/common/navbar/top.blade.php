<nav class="py-4 px-5 bg-yellow-300 py-4 mb-40">
    <div class="flex flex-wrap justify-end items-center mx-auto">
        <a href="{{ route('register')}}" class="block py-2 pr-4 pl-3 mr-8 text-gray-700 rounded sm:hover:text-white md:p-0 ">既に登録済みの方はこちら</a>
        <a
            href="{{ route('login.guest')}}"
            class="inline-flex items-center justify-center w-full px-6 py-2 text-md font-bold text-white rounded-md hover:opacity-80 border-2 border-white  sm:w-auto sm:mb-0"
        >
            <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
                ゲストログイン
            <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>
</nav>
