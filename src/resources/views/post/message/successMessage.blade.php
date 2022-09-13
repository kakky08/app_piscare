@if (session('completion-of-registration-main-image'))
        <div class="mb-12 mx-auto p-3 text-center bg-green-400 text-white w-full rounded-md" role="alert">
            {{ session('completion-of-registration-main-image') }}
        </div>
@elseif (session('completion-of-registration-description'))
        <div class="mb-12 mx-auto p-3 text-center bg-green-400 text-white w-full rounded-md" role="alert">
            {{ session('completion-of-registration-description') }}
        </div>
@endif
