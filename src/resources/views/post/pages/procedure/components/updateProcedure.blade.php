<p class="bg-yellow-200 p-2 mb-12 text-gray-700 text-center rounded-xl">手順の内容の更新</p>
{{-- エラーメッセージ --}}
@include('post.pages.procedure.message.procedureUpdateError')
@foreach ($post->procedures as $key => $procedure)
    <div class="mb-12">
        <div class="flex justify-between items-center mb-8 px-4 pb-2 border-b border-solid border-gray-300">
            <p class="text-xl font-bold">{{ $procedure->order + 1 }}.</p>
            <div class="edit-procedure-button-group">
                <button
                    type="submit"
                    form="update-procedure-{{ $key }}"
                    class="text-white flex-shrink-0 w-40 mr-8 px-4 py-2 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center"
                    >
                    更新
                </button>
                <form method="POST" action="{{ route('post.procedure.destroy')}}" id="delete-procedure-{{ $key }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="procedure" value="{{ $procedure->id }}">
                    <button
                        type="submit"
                        form="delete-procedure-{{ $key }}"
                        class="text-white flex-shrink-0 w-40 px-4 py-2 bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm text-center"
                        >
                        削除
                    </button>
                </form>
            </div>
        </div>
        <form method="POST" action="{{ route('post.procedure.update')}}" id="update-procedure-{{ $key }}"  enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="hidden" name="procedure" value="{{ $procedure->id }}">
            <update-procedure
                :procedure="{{ json_encode($procedure) }}"
            >
            </update-procedure>
        </form>

    </div>

@endforeach
{{-- 区切り線 --}}
<hr class="mb-12 bg-gray-400">

<p class="bg-yellow-200 p-2 mb-12 text-gray-700 text-center rounded-xl">手順の順番の更新</p>

<form method="POST" action="{{ route('post.procedure.sort')}}" id="sort-procedure">
    @method('PUT')
    @csrf
    <input
        type="hidden"
        value="{{ $post->id }}"
        name="post_id"
    >
    <sort-procedure
        :post-id={{ $post->id }}
        :procedures="{{ json_encode($post->procedures) }}"
    >
    </sort-procedure>
    <button
        type="submit"
        form="sort-procedure"
        class="text-white flex-shrink-0 w-full mr-8 px-4 py-2 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center"
        >
        手順の順番を更新する
    </button>
</form>
