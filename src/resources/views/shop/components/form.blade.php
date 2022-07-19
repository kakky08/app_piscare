<form method="GET" action="{{ route('shop.search') }}" class="row common-search-form" >
    <div class="col-4">
        <input type="text" name="keyword" class="form-control"  placeholder="店名">
    </div>
    <div class="col-4">
        <select class="form-select" name='area'>
            <option selected value="">エリアを選択する</option>
            @foreach ($areas as $area)
                <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
            </select>
    </div>
    <button type="submit" class="btn col-2 common-search-button shop-search-button">検索</button>
</form>
<hr class="separator">
