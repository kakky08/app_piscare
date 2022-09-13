<div>
    <div class="recipe-form-title-group">
        <h2 class="text-3xl">作り方の手順</h2>
        <a
            href="{{ route('post.procedure.show', ['post' => $post->id]) }}"
            class="w-52 md:w-60 ml-12 justify-center inline-flex items-center py-2 px-3 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:opacity-80 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm md:px-16 px-8 py-2.5 text-center"
        >
            作り方の手順を編集する
        </a>
    </div>
</div>
@if (count($post->procedures) !== 0)
    @foreach ($post->procedures as $procedure)
        <p class="font-semibold text-2xl">{{ $procedure->order + 1 . '.'}}</p>
        {{-- 料理画像 --}}
        <div class="flex flex-wrap justify-around items-center mb-12 pb-12 border-b border-gray-200 border-solid">
            <img class="w-72 h-72 mb-8 sm:mb-0" src="https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/{{ $procedure->photo }}" alt="手順{{ $procedure->order }}の画像" >
            {{-- 作り方の説明 --}}
            <p class="w-96 p-6 border border-gray-300 border-solid rounded-md">{{ $procedure->procedure }}</p>
        </div>
    @endforeach
@else
    <p class="font-semibold text-2xl">1.</p>
    {{-- 料理画像 --}}
    <div class="flex flex-wrap justify-around items-center mb-12 pb-12 border-b border-gray-200 border-solid">
        <img class="w-72 h-72 mb-8 sm:mb-0" src="{{ asset('images/noimage.jpeg') }}" alt="手順の画像はありません">
        {{-- 作り方の説明 --}}
        <div class="w-96 h-52 p-6 border border-gray-300 border-solid rounded-md"></div>
    </div>
@endif
<a
    href="{{ route('post.index')}}"
    class="w-2/4 mx-auto justify-center inline-flex items-center py-2 px-3 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:opacity-80 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm md:px-16 px-8 py-2.5 text-center"
>
    レシピを登録
</a>
