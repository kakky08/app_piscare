@if($errors->has('seasonings'))
    <div class="row cols-3 spacing-reset">
        <div class="col-1"></div>
        <p class="col alert-message-error">※{{ $errors->first('seasonings') }}</p>
        <div class="col-1"></div>
    </div>
@endif
@if($errors->has('seasonings.*.seasoningName'))
    <div class="row cols-3 spacing-reset">
        <div class="col-1"></div>
        <p class="col alert-message-error">※{{ $errors->first('seasonings.*.seasoningName') }}</p>
        <div class="col-1"></div>
    </div>
@endif
@if($errors->has('seasonings.*.quantity'))
    <div class="row cols-3 spacing-reset">
        <div class="col-1"></div>
        <p class="col alert-message-error">※{{ $errors->first('seasonings.*.quantity') }}</p>
        <div class="col-1"></div>
    </div>
@endif
