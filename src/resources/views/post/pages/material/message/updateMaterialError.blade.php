@if($errors->has('materials'))
    <p class="bg-red-400 text-white px-4 py-2 rounded-md text-base mb-4">※{{ $errors->first('materials') }}</p>
@endif

@if($errors->has('materials.*.materialName'))
    <p class="bg-red-400 text-white px-4 py-2 rounded-md text-base mb-4">※{{ $errors->first('materials.*.materialName') }}</p>
@endif

@if($errors->has('materials.*.quantity'))
    <p class="bg-red-400 text-white px-4 py-2 rounded-md text-base mb-4">※{{ $errors->first('materials.*.quantity') }}</p>
@endif
