@if($errors->has('description'))
    <p class="text-red-600 text-base mb-2">※{{ $errors->first('description') }}</p>
@endif
