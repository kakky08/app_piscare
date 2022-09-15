<ul class="lg:hidden mb-12 flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200">
    <li class="mr-2">
        <a
            href="{{ route('home.index') }}"
            class="{{  $page === 'home' ? 'active text-gray-800 bg-yellow-300 ': 'hover:text-gray-600 hover:bg-yellow-50' }} inline-block p-4 rounded-t-lg"
        >
            <i class="fas fa-home fa-lg pr-2"></i>
            Home
        </a>
    </li>
    <li class="mr-2">
        <a
            href="{{ route('profile.show', ['name' => $user->name]) }}"
            class="{{  $page === 'profile' ? 'active text-gray-800  bg-yellow-300 ': 'hover:text-gray-600 hover:bg-yellow-50' }} inline-block p-4 rounded-t-lg"
        >
            <i class="fas fa-user fa-lg pr-2"></i>
            Profile
        </a>
    </li>
    <li class="mr-2">
        <a
            href="{{ route('setting.index') }}"
            class="{{  $page === 'setting' ? 'active text-gray-800  bg-yellow-300 ': 'hover:text-gray-600 hover:bg-yellow-50' }} inline-block p-4 rounded-t-lg"
        >
            <i class="fas fa-cog fa-lg pr-2"></i>
            Setting
        </a>
    </li>
</ul>
