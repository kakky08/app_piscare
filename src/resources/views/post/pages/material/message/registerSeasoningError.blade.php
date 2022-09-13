@if($errors->has('store_seasoning'))
    <p class="bg-red-400 text-white px-4 py-2 rounded-md text-base mb-4">※{{ $errors->first('store_seasoning') }}</p>
@endif

@if($errors->has('store_seasoning_quantity'))
    <p class="bg-red-400 text-white px-4 py-2 rounded-md text-base mb-4">※{{ $errors->first('store_seasoning_quantity') }}</p>
@endif
