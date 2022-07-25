@if($errors->has('email'))
    <p class="col alert-message-error">※{{ $errors->first('email') }}</p>
@endif
