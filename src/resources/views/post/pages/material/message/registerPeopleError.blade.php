@if($errors->has('people'))
    <div class="row cols-3 spacing-reset">
        <div class="col-1"></div>
        <p class="col alert-message-error">※{{ $errors->first('people') }}</p>
        <div class="col-1"></div>
    </div>
@endif
