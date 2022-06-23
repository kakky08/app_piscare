<nav id="sidebar" class="d-md-block sidebar collapse">
    <div class="position-sticky">

        <form method="GET" action="{{-- {{ route('recipe.search')}} --}}" class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="キーワードを入力してください" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn button-basic" type="submit" id="button-addon2">検索</button>
        </form>

        <div class="accordion" id="accordionExample">
            @foreach ($categories as $category)
                <div class="accordion-item recipe-aside-category-item">
                    <h2 class="accordion-header recipe-aside-category-title" id="headingOne">
                        <button class="accordion-button collapsed recipe-aside-color" type="button" data-bs-toggle="collapse" data-bs-target="#{{ 'category' . $category->id}}" aria-expanded="false" aria-controls="{{ 'category' . $category->id}}">
                            {{ $category->categoryName }}
                        </button>
                    </h2>
                    <div id="{{ 'category' . $category->id}}" class="accordion-collapse collapse recipe-aside-color" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul>
                                <li class="ms-3">
                                    <a href="{{-- {{ route('recipe.category', ['recipe' => $category->searchCategoryId] )}} --}}">
                                        {{ $category->categoryName . '一覧'}}
                                    </a>
                                </li>
                                @foreach ($subCategories as $subCategory)
                                    @if ($category->id === $subCategory->categoryId &&
                                            $category->categoryName !== $subCategory->categoryName)
                                        <li class="ms-3">
                                            <a href="{{-- {{ route('recipe.category', ['recipe' => $subCategory->searchCategoryId] )}} --}}">
                                                {{ $subCategory->categoryName }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</nav>
