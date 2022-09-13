@if($errors->has('file'))
    <p class="text-red-600 text-base mb-2">※{{ $errors->first('file') }}</p>
@endif
