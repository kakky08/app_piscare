@extends('layouts.app')
@section('header')
        @include('common.navbar.app', ['page' => 'setting'])
@endsection
@section('aside')
    @include('common.aside.mypage',  ['page' => 'setting'])
@endsection
@section('main')
    @include('common.tab.mypage',  ['page' => 'setting'])
    <h1 class="text-5xl mb-16">Setting</h1>
    @include('mypage.setting.message.successMessage')
    <h2 class="mypage-subtitle">ニックネームの変更</h2>
    @include('mypage.setting.message.updateNameError')
    <div class="setting-email">
        <div class="setting-block">
            <p class="setting-title">現在のニックネーム</p>
            <p class="setting-text">{{ $user->name }}</p>
        </div>
        <div class="setting-block">
            <p class="setting-title">新しいニックネーム</p>
            <form
                id="updateName"
                method="POST"
                action="{{ route('setting.updateName', ['user' => $user ]) }}"
                class="flex md:flex-row w-3/4 w-full md:space-y-0"
            >
                @method("PATCH")
                @csrf
                <div class="relative ml-16 mr-3 w-full">
                    @if(Auth::id() === 1)
                        <input
                            type="text"
                            name="name"
                            value="{{ $user->name }}"
                            class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            placeholder="新しく登録するニックネームを8文字以内で入力してください"
                            readonly
                        />
                    @else
                        <input
                            type="text"
                            name="name"
                            value="{{ $user->name }}"
                            class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            placeholder="新しく登録するニックネームを8文字以内で入力してください"
                        />
                    @endif
                </div>
                    @if(Auth::id() === 1)
                        <button
                            type="submit"
                            form="updateName"
                            class="text-white flex-shrink-0 px-4 py-2 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center"
                            disabled
                        >
                            変更
                        </button>
                    @else
                        <button
                            type="submit"
                            form="updateName"
                            class="text-white flex-shrink-0 px-4 py-2 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center"
                        >
                            変更
                        </button>
                    @endif
            </form>
        </div>
    </div>
    <h2 class="mypage-subtitle">メールアドレスの変更</h2>
    @include('mypage.setting.message.updateEmailError')
    <div class="setting-email">
        <div class="setting-block">
            <p class="setting-title">現在のメールアドレス</p>
            <p class="setting-text">{{ $user->email }}</p>
        </div>
        <div class="setting-block">
            <p class="setting-title">新しいメールアドレス</p>
            <form
                id="updateEmail"
                method="POST"
                action="{{ route('setting.updateEmail', ['user' => $user ]) }}"
                class="flex md:flex-row w-3/4 w-full md:space-y-0"
            >
                @method("PATCH")
                @csrf
                <div class="relative ml-16 mr-3 w-full">
                    @if(Auth::id() === 1)
                        <input
                            type="email"
                            name="email"
                            class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            placeholder="新しく登録するメールアドレスを入力してください"
                            readonly
                        />
                    @else
                        <input
                            type="email"
                            name="email"
                            class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            placeholder="新しく登録するメールアドレスを入力してください"
                        />
                    @endif
                </div>
                @if(Auth::id() === 1)
                    <button
                        type="submit"
                        form="updateEmail"
                        class="text-white flex-shrink-0 px-4 py-2 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center"
                        disabled
                    >
                        変更
                    </button>
                @else
                    <button
                        type="submit"
                        form="updateEmail"
                        class="text-white flex-shrink-0 px-4 py-2 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center"
                    >
                        変更
                    </button>
                @endif
            </form>
        </div>
    </div>
    @if (isset($user->password))
        <h2 class="mypage-subtitle">パスワードの変更</h2>
        @include('mypage.setting.message.updatePasswordError')
        <form id="updatePassword" method="POST" action="{{ route('setting.updatePassword', ['user' => $user ])}}">
            @method("PATCH")
            @csrf
            <div class="setting-password">
                <div class="mb-8">
                    <p class="setting-title">以前のパスワード</p>
                    <div class="relative ml-16 mr-3 w-10/12">
                        @if(Auth::id() === 1)
                            <input
                                type="password"
                                name="current_password"
                                class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="以前のパスワードを入力してください"
                                readonly
                            />
                        @else
                            <input
                                type="password"
                                name="current_password"
                                class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="以前のパスワードを入力してください"
                            />
                        @endif
                    </div>
                </div>
                <div class="mb-8">
                    <p class="setting-title">新しいパスワード</p>
                    <div class="relative ml-16 mr-3 w-10/12">
                        @if(Auth::id() === 1)
                            <input
                                type="password"
                                name="new_password"
                                class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="新しいパスワードを8文字以上の英数字で入力してください"
                                readonly
                            />
                        @else
                            <input
                                type="password"
                                name="new_password"
                                class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="新しいパスワードを8文字以上の英数字で入力してください"
                            />
                        @endif
                    </div>
                </div>
                <div class="mb-16">
                    <p class="setting-title">パスワードの確認</p>
                    <div class="relative ml-16 mr-3 w-10/12">
                        @if(Auth::id() === 1)
                            <input
                                type="password"
                                name="new_password_confirmation"
                                class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="確認のためもう一度新しいパスワードを入力してください"
                                readonly
                            />
                        @else
                            <input
                                type="password"
                                name="new_password_confirmation"
                                class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="確認のためもう一度新しいパスワードを入力してください"
                            />
                        @endif
                    </div>
                </div>
                @if(Auth::id() === 1)
                    <button
                        type="submit"
                        form="updatePassword"
                        class="text-white ml-8 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm sm:px-32 px-16 py-2.5 text-center"
                        disabled
                    >
                        パスワードを変更する
                    </button>
                @else
                    <button
                        type="submit"
                        form="updatePassword"
                        class="text-white ml-8 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm sm:px-32 px-16 py-2.5 text-center"
                    >
                        パスワードを変更する
                    </button>
                @endif
            </div>
        </form>
    @endif
    {{-- <icon-register
        endpoint="{{ route('setting.icon')}}"
    >
    </icon-register> --}}
    <h2 class="mypage-subtitle">アイコンの変更</h2>
    @include('mypage.setting.message.updateIconError')
    <form id="updateIcon" method="POST"  action="{{ route('setting.updateIcon', ['user' => $user->id ]) }}" enctype="multipart/form-data">
        @method("PATCH")
        @csrf
        <div class="flex p-x8 justify-between items-center">
            <div>
                <p class="bg-yellow-300 text-gray-700 rounded text-center p-1 mb-8">現在のアイコン</p>
                @if (empty($user->icon))
                    <img
                        src="{{ asset('images/yellowtail.png') }}"
                        class="w-40 h-40 lg:w-52 lg:h-52 object-scale-down bg-center rounded-full border-2 border-solid border-yellow-300"
                        alt="{{$user->name}}の初期アイコン">
                @else
                    <img
                        src="https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/{{ $user->icon }}"
                        class="w-40 h-40 lg:w-52 lg:h-52 object-scale-down bg-center rounded-full border-2 border-solid border-yellow-300"
                        alt="{{$user->name}}のアイコン"
                    >
                @endif
            </div>
            <div>
                <p class="bg-yellow-300 text-gray-700 rounded text-center p-1 mb-8">新しいアイコン</p>
                <icon-component></icon-component>
            </div>
            @if(Auth::id() === 1)
                <button
                    type="submit"
                    form="updateIcon"
                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm mt-16 md:px-16 px-8 py-2.5 text-center"
                    disabled
                >
                    アイコンを変更する
                </button>
            @else
                <button
                    type="submit"
                    form="updateIcon"
                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm mt-16 md:px-16 px-8 py-2.5 text-center"
                >
                    アイコンを変更する
                </button>

            @endif
        </div>
    </form>
@endsection
