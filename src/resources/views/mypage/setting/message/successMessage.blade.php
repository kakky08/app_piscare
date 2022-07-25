@if (session('completion-of-update-email'))
    <div class="row spacing-reset">
        <div class="alert alert-message-success col" role="alert">
            {{ session('completion-of-update-email') }}
        </div>
    </div>
@endif
