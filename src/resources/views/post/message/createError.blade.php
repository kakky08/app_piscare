@if($errors->has('title'))
    <p class="col alert-message-error">※{{ $errors->first('title') }}</p>
@endif
