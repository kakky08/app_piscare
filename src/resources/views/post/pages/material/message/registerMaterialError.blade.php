@if($errors->has('store_material'))
    <p class="bg-red-400 text-white px-4 py-2 rounded-md text-base mb-4">※{{ $errors->first('store_material') }}</p>
@endif
@if($errors->has('store_material_quantity'))
    <p class="bg-red-400 text-white px-4 py-2 rounded-md text-base mb-4">※{{ $errors->first('store_material_quantity') }}</p>
@endif
