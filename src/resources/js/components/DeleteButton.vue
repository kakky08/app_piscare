<template>
    <div>
        <button
            type="button"
            class="w-32 md:w-20 ml-12 justify-center inline-flex items-center py-2 px-3 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:opacity-80 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm md:px-16 px-8 py-2.5 text-center"
            @click="openDeleteModal"
        >
            削除
        </button>

            <!-- モーダルを開いた際のbackground -->
            <div
                v-if="this.isDaleteModal"
                class="fixed top-0 left-0 w-full h-full opacity-80 bg-gray-800"
                @click="closeDeleteModal"
            >
            </div>


            <!-- 記録の削除画面 -->
                <div v-if="this.isDaleteModal" role="alert" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 container mx-auto w-11/12 md:w-5/6 max-w-2xl">
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
                                        @click="deleteData"
                                    >
                                        Delete
                                    </button>
                                    <button
                                        type="button"
                                        class="py-2 px-4  bg-gray-400 hover:bg-gray-300 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-indigo-500 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg"
                                        @click="closeDeleteModal"
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
    props: {
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
            isDaleteModal: false,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },
    methods: {
        redirectRoot(){
            location.href= this.redirect
        },
        openDeleteModal(){
            this.isDaleteModal = true;
        },
        closeDeleteModal() {
            this.isDaleteModal = false;
        },
        deleteData() {
            this.redirectRoot();
            axios.delete(this.destroyRoot).then(() => {
                this.redirectRoot();
            });
        }
    },

}
</script>
