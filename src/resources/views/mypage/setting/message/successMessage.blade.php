@if (session('completion-of-update-email'))
    <div class="row spacing-reset">
        <div class="alert alert-message-success col" role="alert">
            {{ session('completion-of-update-email') }}
        </div>
    </div>
@endif
@if (session('conpletion-of-update-password'))
    <div class="row spacing-reset">
        <div class="alert alert-message-success col" role="alert">
            {{ session('conpletion-of-update-password') }}
        </div>
    </div>
@endif
