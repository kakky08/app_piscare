<div class="mb-12 pb-12  border-b border-gray-200 border-solid">
    <div class="flex justify-between mb-16">
        @if(isset($post->people))
            <h2 class="text-3xl">材料・調味料<span class="text-xl ml-4 font-semibold">({{$post->people}}人分)</span></h2>
        @else
            <h2 class="text-3xl">材料・調味料<span class="text-xl ml-4 font-semibold">{{$post->people}}(人分)</span></h2>
        @endif
        <a
            href="{{ route('post.material.show', ['post' => $post->id]) }}"
            class="w-52 md:w-60 ml-12 justify-center inline-flex items-center py-2 px-3 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:opacity-80 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm md:px-16 px-8 py-2.5 text-center"
        >
            材料・調味料を編集する
        </a>
    </div>
    <div class="recipe-form-list-group">
        @if (count($post->materials) !== 0)
            <ul class="recipe-form-list">
                @foreach ($post->materials as $material)
                    <li class="flex justify-between pb-3 px-8 mb-4 border-b border-solid border-gray-300">
                        <h4 class="text-base sm:text-lg list-none">{{ $material->name }}</h4>
                        <p class="text-base sm:text-lg list-none">{{ $material->quantity }}</p>
                    </li>
                @endforeach
            </ul>
        @elseif(count($post->materials) === 0 && count($post->seasonings) === 0)
            <ul class="recipe-form-list">
                @for ($i = 1; $i < 4; $i++)
                    <li class="flex justify-between pb-3 px-8 mb-4 border-b border-solid border-gray-300">
                        <h4 class="text-base sm:text-lg list-none">材料の名前{{ $i }}</h4>
                        <p class="text-base sm:text-lg list-none">材料の分量</p>
                    </li>
                @endfor
            </ul>
        @endif
        @if (count($post->seasonings) !== 0)
            <ul class="recipe-form-list">
                @foreach ($post->seasonings as $seasoning)
                    <li class="row row-cols-2 border-bottom recipe-form-list-item">
                        <h4 class="text-base sm:text-lg list-none"><span>◇</span>{{ $seasoning->name }}</h4>
                        <p class="text-base sm:text-lg list-none">{{ $seasoning->quantity }}</p>
                    </li>
                @endforeach
            </ul>
        @elseif(count($post->seasonings) === 0 && count($post->materials) === 0)
            <ul class="recipe-form-list">
                @for ($j = 1; $j < 3; $j++)
                    <li class="flex justify-between pb-3 px-8 mb-4 border-b border-solid border-gray-300">
                        <h4 class="text-base sm:text-lg list-none"><span>◇</span>調味料の名前{{ $j }}</h4>
                        <p class="text-base sm:text-lg list-none">調味料の分量</p>
                    </li>
                @endfor
            </ul>
        @endif
    </div>
</div>
