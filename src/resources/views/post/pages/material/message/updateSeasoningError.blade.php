@if($errors->has('seasonings'))
    <p class="bg-red-400 text-white px-4 py-2 rounded-md text-base mb-4">※{{ $errors->first('seasonings') }}</p>
@endif

@if($errors->has('seasonings.*.seasoningName'))
    <p class="bg-red-400 text-white px-4 py-2 rounded-md text-base mb-4">※{{ $errors->first('seasonings.*.seasoningName') }}</p>
@endif

@if($errors->has('seasonings.*.quantity'))
    <p class="bg-red-400 text-white px-4 py-2 rounded-md text-base mb-4">※{{ $errors->first('seasonings.*.quantity') }}</p>
@endif
