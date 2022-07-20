@if($errors->has('keyword'))
    <div class="row cols-3 spacing-reset">
        <p class="col alert-message-error">※{{ $errors->first('keyword') }}</p>
    </div>
@endif
@if($errors->has('area'))
    <div class="row cols-3 spacing-reset">
        <p class="col alert-message-error">※{{ $errors->first('area') }}</p>
    </div>
@endif
