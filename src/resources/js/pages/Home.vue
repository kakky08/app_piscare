<template>
<div>
    <nav class="py-4 px-5 bg-yellow-300 py-4">
        <div class="flex flex-wrap justify-end items-center mx-auto">
            <!-- {{ route('login')}} -->
            <a href="" class="block py-2 pr-4 pl-3 mr-8 text-gray-700 rounded sm:hover:text-white md:p-0 ">既に登録済みの方はこちら</a>
            <!-- {{ route('login.guest')}} -->
            <a
                href=""
                class="inline-flex items-center justify-center px-6 py-2 text-md font-bold text-white rounded-md hover:opacity-80 border-2 border-white  sm:w-auto sm:mb-0"
            >
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                    ゲストログイン
                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </nav>
    <div>
        <!-- {{ asset('images/hero.jpg') }} -->
        <img  src="" alt="" class="mb-20">
        <section class="text-center mb-8">
            <p class="text-base tracking-widest pb-5 leading-10">魚を食べていますか？<br />
                活が変わり魚を食べることが減ってしまうと思います。<br />
                手軽に食べれる肉や加工食品もいいですが、健康やメンタルを良い状態に保つには、魚が欠かせません。<br />
                ぜひこのアプリで、魚を習慣的に食事に取り入れましょう！
            </p>
        </section>
        <!-- {{ route('login')}} -->
        <a href="" class="block text-center w-96 px-6 py-3 mt-0 mb-20 mx-auto text-gray-600 bg-gradient-to-r from-yellow-200 via-yellow-300 to-yellow-400 rounded-md hover:opacity-80 hover:text-gray-600">
            アプリを使ってみる
        </a>
        <section>
            <h2 class="text-center text-gray-800 text-3xl md:text-4xl font-bold">主な機能</h2>
            <div class="mb-8">
                <div class="flex items-center flex-col lg:flex-row justify-evenly p-4">
                    <!-- {{-- 記録機能 --}} -->
                    <section class="p-4 sm:border-b lg:border-0">
                        <div class="text-center mb-4 opacity-90">
                            <!-- {{ asset('images/topimage-record.png') }} -->
                            <img src="" alt="記録機能" class="mx-auto object-cover rounded-full h-96 w-96"/>
                        </div>
                        <div>
                            <h3 class="text-gray-800 text-2xl md:text-3xl font-bold lg:text-left mb-4 lg:mb-6 text-center">記録機能</h3>
                            <p class="text-gray-500 md:text-lg mb-6 lg:mb-8 text-center">
                                いつ魚を食べたのか記録を残すことができます。<br />
                                一目でわかるので、モチベーションの維持に役立ちます！
                            </p>
                        </div>
                    </section>
                    <!-- {{-- レシピ・お店検索機能 --}} -->
                    <section class="p-4 sm:border-b lg:border-0">
                        <div class="text-center mb-4 opacity-90">
                            <!-- {{ asset('images/topimage-search.png') }} -->
                            <img src="" alt="レシピ・お店検索機能" class="mx-auto object-cover rounded-full h-96 w-96"/>
                        </div>
                        <h3 class="text-gray-800 text-2xl md:text-3xl font-bold lg:text-left mb-4 lg:mb-6 text-center">レシピ・お店検索機能</h3>
                        <p class="text-gray-500 md:text-lg mb-6 lg:mb-8 text-center">
                            魚レシピを検索できるのでメニューに困る心配がありません。<br />
                            また、料理をしない人でも魚を食べれるお店を検索できるので、<br />
                            無理なく魚食を続けることができます。
                        </p>
                    </section>
                    <!-- {{-- オリジナルレシピの閲覧・投稿 --}} -->
                    <section class="p-4 sm:border-b lg:border-0">
                        <div class="text-center mb-4 opacity-90">
                            <!-- {{ asset('images/topimage-post.png') }} -->
                            <img src="" alt="オリジナルレシピの閲覧・投稿" class="mx-auto object-cover rounded-full h-96 w-96"/>
                        </div>
                        <h3 class="text-gray-800 text-2xl md:text-3xl font-bold lg:text-left mb-4 lg:mb-6 text-center">オリジナルレシピの閲覧・投稿</h3>
                        <p class="text-gray-500 md:text-lg mb-6 lg:mb-8 text-center">
                            ここでしか見られないオリジナルレシピを検索することができます！<br />
                            また、ご自身のオリジナルレシピを投稿もできるので、<br />
                            レシピ開発してみてはいかがでしょう！？
                        </p>
                    </section>
                </div>
            </div>
        </section>
        <!-- {{ route('login')}} -->
        <a href="" class="block text-center w-96 px-6 py-3 mt-0 mb-20 mx-auto text-gray-600 bg-gradient-to-r from-yellow-200 via-yellow-300 to-yellow-400 rounded-md hover:opacity-80 hover:text-gray-600">
            アプリを使ってみる
        </a>
    </div>
        <footer class="bg-yellow-300 p-12"></footer>
    </div>
</template>
