<template>
    <div class="flex justify-between mb-16 border-b pb-2">
        <h1 class="text-4xl">投稿レシピ</h1>
        <div class="block">
            <div class="ml-4 flex items-center md:ml-6">
                <div class="ml-3 relative">
                    <div class="relative inline-block text-left">
                        <div>
                            <button
                                type="button"
                                class="flex items-center justify-center w-full rounded-md  px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-50 hover:opacity-50"
                                id="options-menu"
                                @click="toggleSortMenu"
                            >
                                <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                            </svg>
                            </button>
                        </div>
                        <div v-show="isSortMenu" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5">
                            <div class="py-1 " role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <a :href="sortNew" class="block block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white dark:hover:bg-gray-600" role="menuitem">
                                    <span class="flex flex-col">
                                        <span>
                                            新着順
                                        </span>
                                    </span>
                                </a>
                                <a :href="sortPopular" class="block block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white dark:hover:bg-gray-600" role="menuitem">
                                    <span class="flex flex-col">
                                        <span>
                                            人気順
                                        </span>
                                    </span>
                                </a>
                            </div>
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
        sortNew: {
            type: String
        },
        sortPopular: {
            type: String
        }
    },
    data(){
        return{
            isSortMenu: false,
        }
    },
    methods: {
        toggleSortMenu() {
            this.isSortMenu = !this.isSortMenu
        }
    }
}
</script>
