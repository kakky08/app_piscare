<nav id="sidebar" class="d-md-block sidebar collapse">
    <div class="position-sticky">
        @if($errors->has('keyword'))
            <p class="alert-message-error">※{{ $errors->first('keyword') }}</p>
        @endif
        <form method="GET" action="{{ route('recipe.search')}}" class="input-group common-search-form">
            <input type="text" name="keyword" class="form-control" placeholder="キーワードを入力してください" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn common-search-button" type="submit" id="button-addon2">検索</button>
        </form>

        <div class="accordion" id="accordionExample">
            @foreach ($categories as $category)
                <div class="recipe-category-accordion">
                    <h2 class="accordion-header recipe-aside-category-title" id="headingOne">
                        <button class="accordion-button collapsed recipe-aside-color recipe-category-button" type="button" data-bs-toggle="collapse" data-bs-target="#{{ 'category' . $category->id}}" aria-expanded="false" aria-controls="{{ 'category' . $category->id}}">
                            {{ $category->categoryName }}
                        </button>
                    </h2>
                    <div id="{{ 'category' . $category->id}}" class="accordion-collapse collapse recipe-aside-color" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul class="recipe-category-list">
                                <li class="recipe-category-item">
                                    <a href="{{ route('recipe.category', ['id' => $category->parentCategoryId . $category->id, 'name' => $category->categoryName . '一覧'] )}}">
                                        {{ $category->categoryName . '一覧'}}
                                    </a>
                                </li>
                                @foreach ($category->subCategories as $subCategory)
                                    @if ($category->id === $subCategory->category_id &&
                                            $category->categoryName !== $subCategory->categoryName)
                                        <li class="recipe-category-item">
                                            <a href="{{ route('recipe.category', ['id' => $category->parentCategoryId . $category->id . $subCategory->id, 'name' => $subCategory->categoryName] )}}">
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
