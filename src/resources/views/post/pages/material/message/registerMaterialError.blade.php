@if($errors->has('store_material'))
    <div class="row cols-3 spacing-reset">
        <div class="col-1"></div>
        <p class="col alert-message-error">※{{ $errors->first('store_material') }}</p>
        <div class="col-1"></div>
    </div>
@endif
@if($errors->has('store_material_quantity'))
    <div class="row cols-3 spacing-reset">
        <div class="col-1"></div>
        <p class="col alert-message-error">※{{ $errors->first('store_material_quantity') }}</p>
        <div class="col-1"></div>
    </div>
@endif
