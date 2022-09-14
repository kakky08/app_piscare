<ul class="mb-12 flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200">
    <li class=" w-6/12">
        <a
            href="{{ route('recipe.index') }}"
            class="{{  $isNew  ? 'active text-gray-800 bg-yellow-300 ': 'hover:text-gray-600 hover:bg-yellow-50' }} w-full inline-block p-3 rounded-t-lg"
        >
            新着順
        </a>
    </li>
    <li class=" w-6/12">
        <a
            href="{{ route('recipe.popular') }}"
            class="{{  $isPopular ? 'active text-gray-800 bg-yellow-300 ': 'hover:text-gray-600 hover:bg-yellow-50' }} w-full inline-block p-3 rounded-t-lg"
        >
            人気順
        </a>
    </li>
</ul>
