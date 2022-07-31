@if($errors->has('new-password'))
    <p class="col alert-message-error">※{{ $errors->first('new-password') }}</p>
@endif

@if (session('warning-password'))
    <p class="col alert-message-error">※{{ session('warning-password') }}</p>
@endif
