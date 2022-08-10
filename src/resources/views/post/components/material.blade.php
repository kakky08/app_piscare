<div class="col spacing-reset">
    <div>
        <h2 class="recipe-register-form-title">材料・調味料<span>(人分)</span></h2>
        <a href="" class="btn">材料・調味料を編集する</a>
    </div>
    <div class="recipe-register-form-link">
        @if (count($post->materials) !== 0)
            <ul>
                @foreach ($post->materials as $material)
                    <li class="row row-cols-2 border-bottom recipe-register-form-material-list">
                            <h4 class="col recipe-register-form-material-name">{{ $material->name }}</h4>
                            <p class="col recipe-register-form-material-quantity">{{ $material->quantity }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <ul>
                @for ($i = 1; $i < 4; $i++)
                    <li class="row row-cols-2 spacing-reset border-bottom recipe-register-form-material-list">
                            <h4 class="col">材料の名前{{ $i }}</h4>
                            <p class="col">材料の分量</p>
                    </li>
                @endfor
            </ul>
        @endif
        @if (count($post->seasonings) !== 0)
            <ul>
                @foreach ($post->seasonings as $seasoning)
                    <li class="row row-cols-2 border-bottom recipe-register-form-material-list">
                            <h4 class="col recipe-register-form-material-name">◼️{{ $seasoning->name }}</h4>
                            <p class="col recipe-register-form-material-quantity">{{ $seasoning->quantity }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <ul>
                @for ($j = 1; $j < 3; $j++)
                    <li class="row row-cols-2 spacing-reset border-bottom recipe-register-form-material-list">
                            <h4 class="col">◼️調味料の名前{{ $j }}</h4>
                            <p class="col">調味料の分量</p>
                    </li>
                @endfor
            </ul>
        @endif
    </div>
</div>
