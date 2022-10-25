<template>
    <div>
        <div
            v-if="this.isData"
            class="flex flex-col bg-green-200 h-32 border-l border-b border-gray-900 cursor-pointer"
            :class="{ 'border-r' :  isRightEnd,  'bg-white' :bgWhite}"
            @click="openShowRecord"
        >

            <p v-if="url" class="text-center block w-full h-1/4">{{ day }}</p>
            <p v-else class="text-center">{{ day }}</p>
            <img v-if="url" :src="url" class="h-3/4 object-cover" alt="">
        </div>
        <div
            v-if="!this.isData"
            class="flex flex-col bg-green-200 h-32 border-l border-b border-gray-900 cursor-pointer"
            :class="{ 'border-r' :  isRightEnd,  'bg-white' :bgWhite}"
            @click="openCreateRecord"
        >

            <p v-if="url" class="text-center block w-full h-1/4">{{ day }}</p>
            <p v-else class="text-center">{{ day }}</p>
            <img v-if="url" :src="url" class="h-3/4 object-cover" alt="">
        </div>

            <!-- モーダルを開いた際のbackground -->
            <div
                v-if="this.isOpenRecord"
                class="fixed top-0 left-0 w-full h-full opacity-80 bg-gray-800"
                @click="closeShowRecord"
            >
            </div>
            <div
                v-if="this.isOpenEdit"
                class="fixed top-0 left-0 w-full h-full opacity-80 bg-gray-800"
                @click="closeEditForm"
            >
            </div>
            <div
                v-if="this.isOpenCreateRecord"
                class="fixed top-0 left-0 w-full h-full opacity-80 bg-gray-800"
                @click="closeCreateRecord"
            >
            </div>
            <!-- 記録の詳細画面 -->
                <div v-if="this.isOpenRecord" role="alert" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 container mx-auto w-11/12 md:w-5/6 max-w-2xl">
                    <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                        <div class="flex flex-col justify-center items-center">
                            <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">{{ month }}月{{ day }}日の記録</h1>
                            <!-- 画像入力エリア -->
                            <img class="w-80 h-80 object-contain border border-gray-100 mb-16 rounded object-cover" :src="url" alt="">
                        </div>

                        <label for="name" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">料理名</label>
                        <p class="mb-5 mt-2 text-gray-600 font-normal">{{ title }}</p>
                        <div class="flex items-center justify-end w-full">
                            <button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-green-700 rounded text-white px-8 py-2 text-sm" @click="openEditForm">編集</button>
                            <!-- <form method="DELETE" :action="recordDestroyRoot" id="record-destroy-form"> -->
                                <!-- <input type="hidden" name="_token" :value="csrf"> -->
                                <button type="button" @click="recordDelete" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 ml-3 transition duration-150 ease-in-out hover:bg-indigo-600 bg-red-700 rounded text-white px-8 py-2 text-sm">削除</button>
                            <!-- </form> -->
                            <button class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" @click="closeShowRecord">キャンセル</button>
                        </div>
                        <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" @click="closeShowRecord" aria-label="close modal" role="button">
                            <svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                    </div>
                </div>


            <!-- 記録の編集画面 -->
                <div v-if="this.isOpenEdit" role="alert" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 container mx-auto w-11/12 md:w-5/6 max-w-2xl">
                    <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                        <form method="POST"  :action="recordCreateRoot" id="record-create-form" enctype="multipart/form-data">
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="year_month" :value="year_month">
                            <input type="hidden" name="day" :value="day">
                            <input type="hidden" name="url" value="111">
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
                            <input id="name" name="title" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="30文字以内で入力してください" />
                            <div class="flex items-center justify-end w-full">
                                <button form="record-create-form" type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">登録</button>
                                <button v-if="isData" class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" @click="closeEditForm">キャンセル</button>
                                <button v-else class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" @click="closeShowRecord">キャンセル</button>
                            </div>
                            <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" @click="closeShowRecord" aria-label="close modal" role="button">
                                <svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            <!-- 記録の新規登録画面 -->
                <div v-if="this.isOpenCreateRecord" role="alert" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 container mx-auto w-11/12 md:w-5/6 max-w-2xl">
                    <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                        <form method="POST"  :action="recordCreateRoot" id="record-create-form" enctype="multipart/form-data">
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="year_month" :value="year_month">
                            <input type="hidden" name="day" :value="day">
                            <input type="hidden" name="url" value="111">
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
                                                    <img class="preview-image" :src="url">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="name" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">料理名</label>
                            <input id="name" name="title" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="30文字以内で入力してください" />
                            <div class="flex items-center justify-end w-full">
                                <button form="record-create-form" type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">登録</button>
                                <button class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" @click="closeCreateRecord">キャンセル</button>
                            </div>
                            <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" @click="closeCreateRecord" aria-label="close modal" role="button">
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
        isRightEnd: {
            type: Boolean,
            default: false
        },
        bgWhite: {
            type: Boolean,
            default: false
        },
        url: {
            type: String
        },
        isData: {
            type: Boolean,
            default: false
        },
        recordCreateRoot: {
            type: String,
        },
        recordDestroyRoot: {
            type: String
        }
    },
    data() {
        return {
            isOpenRecord: false,
            isOpenEdit: false,
            isOpenCreateRecord: false,
            url: this.url,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },
    methods: {
        openShowRecord() {
            this.isOpenRecord = true
        },
        closeShowRecord() {
            this.isOpenEdit = false;
            this.isOpenRecord = false
        },
        openEditForm() {
            this.isOpenEdit = true;
            this.isOpenRecord = false;
        },
        closeEditForm() {
            this.isOpenEdit = false;
            this.isOpenRecord = true;
        },
        onChange(){
            const file = this.$refs.preview.files[0];
            this.url = URL.createObjectURL(file);
        },
        openCreateRecord(){
            this.isOpenCreateRecord = true;
        },
        closeCreateRecord() {
            this.isOpenCreateRecord = false;
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
