<template>
    <div>
        <button
            type="button"
            class="w-32 md:w-20 ml-12 justify-center inline-flex items-center py-2 px-3 text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:opacity-80 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm md:px-16 px-8 py-2.5 text-center"
            @click="openCreateRecord"
        >
            記録する
        </button>

            <!-- モーダルを開いた際のbackground -->
            <div
                v-if="this.isOpenCreateRecord"
                class="fixed top-0 left-0 w-full h-full opacity-80 bg-gray-800"
                @click="closeCreateRecord"
            >
            </div>


            <!-- 記録の編集画面 -->
                <div v-if="this.isOpenCreateRecord" role="alert" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 container mx-auto w-11/12 md:w-5/6 max-w-2xl z-20">
                    <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                        <form method="POST"  :action="recordCreateRoot" id="record-create-form" enctype="multipart/form-data">
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="year_month" :value="year_month">
                            <input type="hidden" name="day" :value="day">
                            <input type="hidden" name="link" :value="link">
                            <div class="flex flex-col justify-center items-center">
                                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">{{ month }}月{{ day }}日の記録</h1>
                                <div class="row cols-2 procedure-form-group mx-auto">
                                    <div class="col-4 image-input-block" >
                                        <div class=" image-input-box">
                                            <div class="image-input-field">
                                                <input type="file" name="file" title ref="preview" @change="onChange">
                                                <p>
                                                    <span class="image-input-text">クリックして料理の写真を載せる</span>
                                                    <br>
                                                    <i class="fas fa-camera fa-2x"></i>
                                                </p>
                                                <div class="preview-box" v-if="url">
                                                    <img class="preview-image object-cover h-full" :src="url">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="name" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">料理名</label>
                            <input
                                id="name"
                                name="title"
                                class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                :value="title"
                                placeholder="30文字以内で入力してください"
                            />
                            <div class="flex items-center justify-end w-full">
                                <button
                                    form="record-create-form"
                                    type="submit"
                                    class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:opacity-80 rounded text-white px-8 py-2 text-sm"
                                >
                                    登録
                                </button>
                                <button
                                    type="button"
                                    class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gradient-to-r from-gray-400 via-gray-500 to-gray-600 transition duration-150 text-white hover:opacity-80 ease-in-out rounded px-8 py-2 text-sm"
                                    @click="closeCreateRecord"
                                >
                                    キャンセル
                                </button>
                            </div>
                            <button type="button" class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" @click="closeCreateRecord" aria-label="close modal" role="button">
                                <svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
    </div>
</template>

<script>

export default {
    name: "ProfileImagePreviewComponent",
    props: {
        month: {
            type: String
        },
        day: {
            type: String
        },
        year_month: {
            type: String
        },
        url: {
            type: String
        },
        title: {
            type: String
        },
        recordCreateRoot: {
            tyep: String
        },
        link: {
            type: String
        }

    },
    data() {
        return {
            isOpenCreateRecord: false,
            url: this.url,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },
    methods: {

        openCreateRecord(){
            this.isOpenCreateRecord = true;
        },
        closeCreateRecord() {
            this.isOpenCreateRecord = false;
        },
        onChange(){
            const file = this.$refs.preview.files[0];
            this.url = URL.createObjectURL(file);
        },
        async recordDelete() {
            await axios.delete(this.recordDestroyRoot);

        }
    },
    mounted () {
        this.$emit('file', this.url)
    }
}
</script>
