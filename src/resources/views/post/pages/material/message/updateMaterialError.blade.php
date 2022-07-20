@if($errors->has('materials'))
    <div class="row cols-3 spacing-reset">
        <div class="col-1"></div>
        <p class="col alert-message-error">※{{ $errors->first('materials') }}</p>
        <div class="col-1"></div>
    </div>
@endif
@if($errors->has('materials.*.materialName'))
    <div class="row cols-3 spacing-reset">
        <div class="col-1"></div>
        <p class="col alert-message-error">※{{ $errors->first('materials.*.materialName') }}</p>
        <div class="col-1"></div>
    </div>
@endif
@if($errors->has('materials.*.quantity'))
    <div class="row cols-3 spacing-reset">
        <div class="col-1"></div>
        <p class="col alert-message-error">※{{ $errors->first('materials.*.quantity') }}</p>
        <div class="col-1"></div>
    </div>
@endif
