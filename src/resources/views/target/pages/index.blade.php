@extends('layouts.app')
@section('header')
    @include('common.navbar.app', ['page' => 'home'])
@endsection
@section('aside')
    @include('common.aside.mypage',  ['page' => 'home'])
@endsection
@section('main')
<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
    <!-- text - start -->
        <div class="mb-10 md:mb-16">
            <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">目標設定</h2>

            <p class="max-w-screen-md text-gray-500 md:text-lg text-center mx-auto">1ヶ月に何回魚を食べるか目標を設定しましょう!</p>
        </div>
    <!-- text - end -->

    <!-- form - start -->
        <form
            method="POST"
            action="{{ route('target.store' )}}"
            class="max-w-screen-md grid sm:grid-cols-2 gap-4 mx-auto"
        >
        @csrf
            <input type="hidden" name="year_month" value="{{ $year_month }}">

            <div class="sm:col-span-2">
                <label for="target" class="inline-block text-gray-800 text-sm sm:text-lg mb-2">目標<small class="text-gray-500 text-sm ml-4">30文字以内で入力してください</small></label>
                <input
                    name="target"
                    class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2"
                    placeholder="例) 生活習慣を改善する"
                />
            </div>

            <div class="sm:col-span-2">
                <label for="subject" class="inline-block text-gray-800 text-sm sm:text-lg mb-2">回数</label>
                <select class="block w-52 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="time">
                    @for ($i = 1; $i <= $days; $i++)
                        <option value="{{ $i }}">
                            {{ $i }}回
                        </option>
                    @endfor
                </select>


            </div>
            <div class="sm:col-span-2">
                <h3 class="max-w-screen-md text-gray-800 mx-auto text-md mb-2">※ 1ヶ月に食べる回数の目安</h3>
                <div class="ml-4">
                    <p class="max-w-screen-md text-gray-500 md:text-base mx-auto">魚を週に2回以上食べると心臓病の発症が減り、寿命を延ばせるという研究結果があります</p>
                    <a
                        class="max-w-screen-md text-gray-500 md:text-base text-center mx-auto"
                        href="https://www.hsph.harvard.edu/news/press-releases/higher-blood-omega-3s-associated-with-lower-risk-of-dying-among-older-adults/"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        Higher blood omega-3s associated with lower risk of premature death among older adults
                        <br />
                        （ハーバード大学公衆衛生大学院 2013年4月16日
                    </a>
                </div>

            </div>


            <div class="sm:col-span-2 flex justify-between items-center">
                <button
                    class="text-white flex-shrink-0 px-4 py-2 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center"
                    type="submit"
                >
                    登録
                </button>

            </div>

        </form>
        <!-- form - end -->
    </div>
</div>
@endsection
