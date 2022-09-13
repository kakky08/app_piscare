<ul class="mb-12 flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200">
    <li class=" w-3/12">
        <a
            href="{{ route('information.show', ['name' =>  $information->name]) }}"
            class="{{  $isPosts  ? 'active text-gray-800 bg-gray-100 ': 'hover:text-gray-600 hover:bg-gray-50' }} w-full inline-block p-3 rounded-t-lg"
        >
            投稿レシピ
        </a>
    </li>
    <li class=" w-3/12">
        <a
            href="{{ route('information.likes', ['name' =>  $information->name]) }}"
            class="{{  $isLikes ? 'active text-gray-800 bg-gray-100 ': 'hover:text-gray-600 hover:bg-gray-50' }} w-full inline-block p-3 rounded-t-lg"
        >
            いいね
        </a>
    </li>
    <li class=" w-3/12">
        <a
            href="{{ route('information.followings', ['name' =>  $information->name]) }}"
            class="{{  $isFollowings ? 'active text-gray-800 bg-gray-100 ': 'hover:text-gray-600 hover:bg-gray-50' }} w-full inline-block p-3 rounded-t-lg"
        >
            フォロー
        </a>
    </li>
    <li class=" w-3/12">
        <a
            href="{{ route('information.followers', ['name' =>  $information->name]) }}"
            class="{{  $isFollowers ? 'active text-gray-800 bg-gray-100 ': 'hover:text-gray-600 hover:bg-gray-50' }} w-full inline-block p-3 rounded-t-lg"
        >
            フォロワー
        </a>
    </li>
</ul>
