@if($errors->has('update_file'))
    <p class="bg-red-400 text-white px-4 py-2 rounded-md text-base mb-4">※{{ $errors->first('update_file') }}</p>
@endif
@if($errors->has('update_procedure'))
    <p class="bg-red-400 text-white px-4 py-2 rounded-md text-base mb-4">※{{ $errors->first('update_procedure') }}</p>
@endif
