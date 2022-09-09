<div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-8">
    @foreach($user->recipeLikes as $recipe)
        <div class="mx-auto max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            @if (isset($recipe->foodImageUrl))
            <a href="{{ route('recipe.show', $recipe->id) }}">
                <img
                    class="rounded-t-lg w-full h-64 object-cover"
                    src="{{ $recipe->foodImageUrl }}"
                    alt="{{ $recipe->title }}"
                />
            </a>
            @else
            <a href="{{ route('recipe.show', $recipe->id) }}">
                <img
                    class="rounded-t-lg w-full h-64 object-cover hover:opacity-80"
                    src="{{ asset('images/noimage.jpeg') }}"
                    alt="イメージが存在しません"
                />
            </a>
            @endif
            <div class="p-5">
                <a href="{{ route('recipe.show', $recipe->id) }}">
                    <h5 class="mb-3 h-28 text-2xl font-bold tracking-tight text-gray-900 dark:text-white hover:opacity-80">
                        {{ $recipe->recipeTitle}}
                    </h5>
                </a>
                <p class="mb-3 h-40 font-normal text-gray-700 dark:text-gray-400">
                    {{ $recipe->recipeDescription }}
                </p>
                <a
                    href="{{ route('recipe.show', $recipe->id) }}"
                    class="w-full justify-center inline-flex items-center py-2 px-3 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:opacity-80 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm mt-16 md:px-16 px-8 py-2.5 text-center"
                >
                    レシピを見る
                    <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>


           {{--  <div class="card common-card-item">
                @if (isset($recipe->foodImageUrl))
                    <img src="{{ $recipe->foodImageUrl }}" class="card-img-top common-card-image" alt="{{ $recipe->title }}">
                @else
                    <img src="{{ asset('images/noimage.jpeg') }}" class="card-img-top common-card-image" alt="イメージが存在しません" style="width: 214px, height:214px">
                @endif
                <div class="card-body">
                    <h5 class="common-card-title">{{ $recipe->recipeTitle}}</h5>
                    <p class="common-card-text">{{ $recipe->recipeDescription }}</p>
                    <div class="d-grid">
                        <a href="{{ route('recipe.show', $recipe->id) }}" class="btn common-card-button stretched-link">レシピを見る</a>
                    </div>
                </div>
            </div> --}}
    @endforeach

    <!-- feature - start -->
      <div class="mx-auto max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="{{ asset('images/noimage.jpeg') }}" alt="" />
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
    </div>
     {{--  <div class="flex flex-col border rounded-lg p-4 md:p-6">
        <h3 class="text-lg md:text-xl font-semibold mb-2">Growth</h3>
        <p class="text-gray-500 mb-4">Filler text is dummy text which has no meaning however looks very similar to real text.</p>
        <a href="#" class="text-indigo-500 hover:text-indigo-600 active:text-indigo-700 font-bold transition duration-100 mt-auto">More</a>
      </div> --}}
      <!-- feature - end -->

      <!-- feature - start -->
    <div class="mx-auto max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="{{ asset('images/noimage.jpeg') }}" alt="" />
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
    </div>
      {{-- <div class="flex flex-col border rounded-lg p-4 md:p-6">
        <h3 class="text-lg md:text-xl font-semibold mb-2">Security</h3>
        <p class="text-gray-500 mb-4">Filler text is dummy text which has no meaning however looks very similar to real text.</p>
        <a href="#" class="text-indigo-500 hover:text-indigo-600 active:text-indigo-700 font-bold transition duration-100 mt-auto">More</a>
      </div> --}}
      <!-- feature - end -->

      <!-- feature - start -->
      <div class="mx-auto max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="{{ asset('images/noimage.jpeg') }}" alt="" />
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
    </div>
      <!-- feature - end -->

      <!-- feature - start -->
      <div class="mx-auto max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="{{ asset('images/noimage.jpeg') }}" alt="" />
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
    </div>
      {{-- <div class="flex flex-col border rounded-lg p-4 md:p-6">
        <h3 class="text-lg md:text-xl font-semibold mb-2">Speed</h3>
        <p class="text-gray-500 mb-4">Filler text is dummy text which has no meaning however looks very similar to real text.</p>
        <a href="#" class="text-indigo-500 hover:text-indigo-600 active:text-indigo-700 font-bold transition duration-100 mt-auto">More</a>
      </div> --}}
      <!-- feature - end -->

      <!-- feature - start -->
      <div class="mx-auto max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="{{ asset('images/noimage.jpeg') }}" alt="" />
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
    </div>
      {{-- <div class="flex flex-col border rounded-lg p-4 md:p-6">
        <h3 class="text-lg md:text-xl font-semibold mb-2">Support</h3>
        <p class="text-gray-500 mb-4">Filler text is dummy text which has no meaning however looks very similar to real text.</p>
        <a href="#" class="text-indigo-500 hover:text-indigo-600 active:text-indigo-700 font-bold transition duration-100 mt-auto">More</a>
      </div> --}}
      <!-- feature - end -->

      <!-- feature - start -->
      {{-- <div class="flex flex-col border rounded-lg p-4 md:p-6">
        <h3 class="text-lg md:text-xl font-semibold mb-2">Dark Mode</h3>
        <p class="text-gray-500 mb-4">Filler text is dummy text which has no meaning however looks very similar to real text.</p>
        <a href="#" class="text-indigo-500 hover:text-indigo-600 active:text-indigo-700 font-bold transition duration-100 mt-auto">More</a>
      </div> --}}
      <!-- feature - end -->
    </div>
