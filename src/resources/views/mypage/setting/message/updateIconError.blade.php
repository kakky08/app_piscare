@if($errors->has('file'))
    <p class="bg-red-400 text-white px-4 py-2 rounded-md text-base mb-4">※{{ $errors->first('file') }}</p>
@endif
