<div class="col spacing-reset">
    <div class="recipe-form-title-group">
        <h2 class="recipe-form-title">材料・調味料<span>(人分)</span></h2>
        <a href="" class="btn post-edit-button">材料・調味料を編集する</a>
    </div>
    <div class="recipe-form-list-group">
        @if (count($post->materials) !== 0)
            <ul class="recipe-form-list">
                @foreach ($post->materials as $material)
                    <li class="row row-cols-2 border-bottom recipe-form-list-item">
                        <h4 class="col">{{ $material->name }}</h4>
                        <p class="col">{{ $material->quantity }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <ul class="recipe-form-list">
                @for ($i = 1; $i < 4; $i++)
                    <li class="row row-cols-2 spacing-reset border-bottom recipe-form-list-item">
                        <h4 class="col">材料の名前{{ $i }}</h4>
                        <p class="col">材料の分量</p>
                    </li>
                @endfor
            </ul>
        @endif
        @if (count($post->seasonings) !== 0)
            <ul class="recipe-form-list">
                @foreach ($post->seasonings as $seasoning)
                    <li class="row row-cols-2 border-bottom recipe-form-list-item">
                        <h4 class="col"><span>◇</span>{{ $seasoning->name }}</h4>
                        <p class="col">{{ $seasoning->quantity }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <ul class="recipe-form-list">
                @for ($j = 1; $j < 3; $j++)
                    <li class="row row-cols-2 spacing-reset border-bottom recipe-form-list-item">
                        <h4 class="col"><span>◇</span>調味料の名前{{ $j }}</h4>
                        <p class="col">調味料の分量</p>
                    </li>
                @endfor
            </ul>
        @endif
    </div>
</div>
