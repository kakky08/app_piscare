@extends('layouts.auth.app')

@section('header')
    @include('common.navbar.auth', ['page' => 'social'])
@endsection

@section('main')

<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
        <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-8">Register User</h2>
            @if ($errors->any())
                <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg items-end max-w-lg border rounded-lg mx-auto" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Danger</span>
                    <div>
                        <ul class="mt-1.5 ml-4 text-red-700 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        <form method="POST" action="{{ route('register.{provider}', ['provider' => $provider]) }}" class="max-w-lg border rounded-lg mx-auto">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="flex flex-col gap-4 p-4 md:p-8">
                <div>
                    <label for="name" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Name</label>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autocomplete="name"
                        autofocus
                        placeholder="ニックネームを8文字以内で入力してください"
                        class="@error('name') is-invalid @enderror w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2"
                    />
                </div>
                <div>
                    <label for="email" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Email</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ $email }}"
                        required
                        autocomplete="email"
                        autofocus
                        class="@error('email') is-invalid @enderror w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2"
                    />
                </div>

                <button type="submit" class="block bg-green-600 hover:bg-green-500 active:bg-gray-600 focus-visible:ring ring-gray-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">Register</button>
            </div>
        </form>
    </div>
</div>

@endsection
