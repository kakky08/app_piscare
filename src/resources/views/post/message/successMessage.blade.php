@if (session('completion-of-registration-main-image'))
    <div class="row cols-4 spacing-reset">
        <div class="col-1"></div>
        <div class="alert alert-message-success col" role="alert">
            {{ session('completion-of-registration-main-image') }}
        </div>
        <div class="col-1"></div>
    </div>
@elseif (session('completion-of-registration-description'))
    <div class="row cols-4 spacing-reset">
        <div class="col-1"></div>
        <div class="alert alert-message-success col" role="alert">
            {{ session('completion-of-registration-description') }}
        </div>
        <div class="col-1"></div>
    </div>
@endif
