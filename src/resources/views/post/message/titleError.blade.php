@if($errors->has('title'))
    <p class="text-red-600 text-base mb-2">※{{ $errors->first('title') }}</p>
@endif
