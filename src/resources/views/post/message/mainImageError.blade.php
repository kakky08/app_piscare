@if($errors->has('file'))
    <p class="col alert-message-error">※{{ $errors->first('file') }}</p>
@endif
