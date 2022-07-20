@if($errors->has('store_seasoning'))
    <div class="row cols-3 spacing-reset">
        <div class="col-1"></div>
        <p class="col alert-message-error">※{{ $errors->first('store_seasoning') }}</p>
        <div class="col-1"></div>
    </div>
@endif
@if($errors->has('store_seasoning_quantity'))
    <div class="row cols-3 spacing-reset">
        <div class="col-1"></div>
        <p class="col alert-message-error">※{{ $errors->first('store_seasoning_quantity') }}</p>
        <div class="col-1"></div>
    </div>
@endif
