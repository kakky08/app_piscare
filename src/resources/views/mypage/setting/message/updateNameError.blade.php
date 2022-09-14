@if($errors->has('name'))
    <p class="col alert-message-error">※{{ $errors->first('name') }}</p>
@endif
