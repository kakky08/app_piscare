<template>

<div>
    <nav class="bg-yellow-300  shadow py-2">
        <div class="max-w-8xl mx-auto px-8">
            <div class="flex items-center justify-between h-16">
                <div class="-mr-2 flex lg:hidden">
                    <button
                        class="text-gray-600 dark:text-white hover:text-gray-300 inline-flex items-center justify-center p-2 rounded-md focus:outline-none"
                        @click="toggleSideMenu"
                    >
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-align-justified" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="4" y1="6" x2="20" y2="6"></line>
                                <line x1="4" y1="12" x2="20" y2="12"></line>
                                <line x1="4" y1="18" x2="16" y2="18"></line>
                            </svg>
                    </button>
                </div>
                <div class="flex items-center hidden lg:block">
                    <a class="flex-shrink-0" href="/home">
                        Piscare
                        <!-- <img class="h-8 w-8" src="/icons/rocket.svg" alt="Workflow"/> -->
                    </a>
                </div>
                <div class="block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <div class="ml-3 relative">
                            <div class="relative inline-block text-left">
                                <div>
                                    <button
                                        type="button"
                                        class="flex items-center justify-center w-full rounded-md  px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-50 hover:opacity-50 border-white"
                                        id="options-menu"
                                        @click="toggleUserMenu"
                                    >

                                        <!-- <svg width="20" fill="currentColor" height="20" class="text-gray-800" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1523 1339q-22-155-87.5-257.5t-184.5-118.5q-67 74-159.5 115.5t-195.5 41.5-195.5-41.5-159.5-115.5q-119 16-184.5 118.5t-87.5 257.5q106 150 271 237.5t356 87.5 356-87.5 271-237.5zm-243-699q0-159-112.5-271.5t-271.5-112.5-271.5 112.5-112.5 271.5 112.5 271.5 271.5 112.5 271.5-112.5 112.5-271.5zm512 256q0 182-71 347.5t-190.5 286-285.5 191.5-349 71q-182 0-348-71t-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z">
                                            </path>
                                        </svg> -->
                                        <img v-if="isIcon" :src="icon" class="profile-icon w-12 h-12" :alt="iconAlt + 'のアイコン'">
                                        <img v-else :src="defaultIcon" class="profile-icon w-12 h-12" :alt="iconAlt + 'のアイコン'">
                                    </button>
                                </div>
                                <div v-show="isUserMenu" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5">
                                    <div class="py-1 " role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                        <a :href="recordRoute" class="block block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white dark:hover:bg-gray-600" role="menuitem">
                                            <span class="flex flex-col">
                                                <span>
                                                    記録
                                                </span>
                                            </span>
                                        </a>
                                        <a :href="recipeRoute" class="block block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white dark:hover:bg-gray-600" role="menuitem">
                                            <span class="flex flex-col">
                                                <span>
                                                    レシピ
                                                </span>
                                            </span>
                                        </a>
                                        <form id="logout-form" :action="logout" method="POST">
                                            <input type="hidden" name="_token" :value="csrf">
                                        <button type="submit" form="logout-form" class="block block w-full text-start px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white dark:hover:bg-gray-600" role="menuitem">
                                            <span class="flex flex-col">
                                                <span>
                                                    Logout
                                                </span>
                                            </span>
                                        </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div
        class="lg:hidden flex h-screen bg-gray-50 dark:bg-gray-900 float-left absolute"
        v-show="isSideMenuOpen"

    >
        <aside class="w-64 bg-gray-50 z-20">
            <div class="px-4 py-4 sm:px-3">
                <a class="text-gray-800 hover:text-gray-800 dark:hover:text-white block px-2 py-2 mb-4 rounded-md text-2xl font-medium" href="/#">
                    Piscare
                </a>
                <a class="hover:text-gray-800 hover:bg-gray-100 flex items-center p-2 my-6 transition-colors text-gray-600"
                    :href="homeRoute"
                >
                    <i class="fas fa-home fa-lg w-5"></i>
                    <span class="mx-4 text-lg font-normal">
                        Home
                    </span>
                    <span class="flex-grow text-right">
                    </span>
                </a>
                <a class="hover:text-gray-800 hover:bg-gray-100 flex items-center p-2 my-6 transition-colors text-gray-600"
                    :href="recordRoute"
                >
                    <i class="fas fa-clipboard fa-lg w-5"></i>
                    <span class="mx-4 text-lg font-normal">
                        記録
                    </span>
                    <span class="flex-grow text-right">
                    </span>
                </a>
                <a class="hover:text-gray-800 hover:bg-gray-100 flex items-center p-2 my-6 transition-colors text-gray-600"
                    :href="recipeRoute"
                >
                    <i class="fas fa-utensils fa-lg w-5"></i>
                    <span class="mx-4 text-lg font-normal">
                        レシピ
                    </span>
                    <span class="flex-grow text-right">
                    </span>
                </a>
                <a class="hover:text-gray-800 hover:bg-gray-100 flex items-center p-2 my-6 transition-colors text-gray-600"
                    :href="postRoute"
                >
                    <i class="fas fa-pen-square fa-lg w-5"></i>
                    <span class="mx-4 text-lg font-normal">
                        投稿
                    </span>
                    <span class="flex-grow text-right">
                    </span>
                </a>
                <a class="hover:text-gray-800 hover:bg-gray-100 flex items-center p-2 my-6 transition-colors text-gray-600"
                    :href="shopRoute"
                >
                    <i class="fas fa-store-alt fa-lg w-5"></i>
                    <span class="mx-4 text-lg font-normal">
                        お店
                    </span>
                    <span class="flex-grow text-right">
                    </span>
                </a>
                <button
                    class="hover:text-gray-800 hover:bg-gray-100 flex items-center p-2 my-8 transition-colors text-gray-600"
                    @click="togglePagesMenu"
                        aria-haspopup="true"
                >
               <i class="fas fa-home fa-lg"></i>
                    <span class="mx-4 text-lg font-normal">
                        マイページ
                    </span>
                    <span class="flex-grow text-right">
                    </span>
                <svg
                  class="w-4 h-4"
                  aria-hidden="true"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </button>
              <template v-if="isPagesMenuOpen">
                <ul
                  x-transition:enter="transition-all ease-in-out duration-300"
                  x-transition:enter-start="opacity-25 max-h-0"
                  x-transition:enter-end="opacity-100 max-h-xl"
                  x-transition:leave="transition-all ease-in-out duration-300"
                  x-transition:leave-start="opacity-100 max-h-xl"
                  x-transition:leave-end="opacity-0 max-h-0"
                  class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                  aria-label="submenu"
                >
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full block text-lg font-normal" :href="profileRoute">プロフィール</a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full block text-lg font-normal" :href="targetRoute">目標設定</a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full block text-lg font-normal" :href="settingRoute">その他設定</a>
                  </li>

                </ul>
              </template>
            </div>
        </aside>
    </div>
</div>

</template>

<script>
export default {
    props: {
        isIcon: {
            type: Boolean
        },
        icon: {
            type: String
        },
        defaultIcon:{
            type: String
        },
        iconAlt: {
            type: String
        },
        logout: {
            type: String
        },
        homeRoute: {
            type: String
        },
        recordRoute: {
            type: String
        },
        recipeRoute: {
            type: String
        },
        postRoute: {
            type: String
        },
        shopRoute: {
            type: String
        },
        profileRoute: {
            type: String
        },
        targetRoute: {
            type: String
        },
        settingRoute: {
            type: String
        },

    },
    data () {
        return {
            isUserMenu: false,
            isSideMenuOpen: false,
            isPagesMenuOpen: false,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },
    methods: {
        toggleUserMenu() {
            this.isUserMenu = !this.isUserMenu
        },
        closeUserMenu() {
            this.isUserMenu = false
        },
        toggleSideMenu() {
            this.isSideMenuOpen = !this.isSideMenuOpen
        },
        togglePagesMenu() {
            this.isPagesMenuOpen = !this.isPagesMenuOpen
        }
    }
}
</script>
