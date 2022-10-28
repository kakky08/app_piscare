<template>
    <div>
        <div
            class="flex flex-col bg-yellow-300 h-32 border-l border-b border-gray-900 cursor-pointer"
            :class="{ 'border-r' :  isRightEnd,  'bg-white' :bgWhite}"
            @click="openShowRecord"
        >

            <p v-if="url" class="text-center block w-full h-1/6">{{ day }}</p>
            <p v-else class="text-center">{{ day }}</p>
            <img v-if="url" :src="url" class="h-5/6 object-cover" alt="">
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
                v-if="this.isOpenDelete"
                class="fixed top-0 left-0 w-full h-full opacity-80 bg-gray-800"
                @click="closeDeleteForm"
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
                            <!-- <button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-green-700 rounded text-white px-8 py-2 text-sm" @click="openEditForm">編集</button> -->
                            <!-- <form method="DELETE" :action="recordDestroyRoot" id="record-destroy-form"> -->
                                <!-- <input type="hidden" name="_token" :value="csrf"> -->
                                <!-- <button type="button" @click="openDeleteForm" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 ml-3 transition duration-150 ease-in-out hover:bg-indigo-600 bg-red-700 rounded text-white px-8 py-2 text-sm">削除</button> -->
                            <!-- </form> -->
                            <!-- <button  class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" @click="closeShowRecord">キャンセル</button> -->
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
                        <form method="POST"  :action="recordEditRoot" id="record-edit-form" enctype="multipart/form-data">
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
                            <input
                                id="name"
                                name="title"
                                :value="this.title"
                                class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="30文字以内で入力してください" />
                            <div class="flex items-center justify-end w-full">
                                <button form="record-edit-form" type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">登録</button>
                                <button type="button" class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" @click="closeShowRecord">キャンセル</button>
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

                <!-- 記録の削除画面 -->
                <div v-if="this.isOpenDelete" role="alert" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 container mx-auto w-11/12 md:w-5/6 max-w-2xl">
                    <div class="shadow-lg rounded-2xl p-4 bg-white w-80 m-auto">
                        <div class="w-full h-full text-center">
                            <div class="flex h-full flex-col justify-between">
                                <svg width="40" height="40" class="mt-4 w-12 h-12 m-auto text-yellow-300" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M704 1376v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm-544-992h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z">
                                    </path>
                                </svg>
                                <p class="text-gray-800 dark:text-gray-200 text-xl font-bold mt-4">
                                    本当に削除しますか？
                                </p>
                                <div class="flex items-center justify-between gap-4 w-full mt-8">
                                    <button
                                        type="button"
                                        class="py-2 px-4  bg-red-600 hover:bg-red-500 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg"
                                        @click="deleteData()"
                                    >
                                        Delete
                                    </button>
                                    <button
                                        type="button"
                                        class="py-2 px-4  bg-gray-400 hover:bg-gray-300 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-indigo-500 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg"
                                        @click="closeDeleteForm"
                                    >
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
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
        recordEditRoot: {
            type: String,
        },
        recordDestroyRoot: {
            type: String
        },
        destroyRoot: {
            type: String,
        },
        redirect: {
            type: String,
        }
    },
    data() {
        return {
            rote: this.destroyRoot,
            isOpenRecord: false,
            isOpenEdit: false,
            isOpenDelete: false,
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
        openDeleteForm() {
            this.isOpenDelete = true;
            this.isOpenRecord = false;
        },
        closeDeleteForm() {
            this.isOpenDelete = false;
            this.isOpenRecord = true;
        },
        redirectRoot(){
            location.href= this.redirect
        },
        deleteData() {
            // this.redirectRoot();
            axios.delete(this.destroyRoot).then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
        }
    },
    mounted () {
        this.$emit('file', this.url)
    }
}
</script>
