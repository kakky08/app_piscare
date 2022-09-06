<nav class="py-4 px-5 bg-yellow-300 py-4 mb-8">
    <div class="flex flex-wrap justify-between items-center mx-auto">
        <p class="font-medium text-xl">Piscare</p>
        @if ($page === 'login')
            <a class="block py-2 pr-4 pl-3 text-gray-700 rounded sm:hover:text-white md:p-0" aria-current="page" href="{{ route('register') }}">Register</a>
        @endif
        @if ($page === 'register')
            <a class="block py-2 pr-4 pl-3 text-gray-700 rounded sm:hover:text-white md:p-0" aria-current="page" href="{{ route('login') }}">Login</a>
        @endif
    </div>
</nav>
