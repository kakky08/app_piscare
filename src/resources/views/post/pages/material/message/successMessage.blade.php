@if (session('completion-of-registration-people'))
    <div class="mb-12 mx-auto p-3 text-center bg-green-400 text-white w-full rounded-md" role="alert">
        {{ session('completion-of-registration-people') }}
    </div>

@elseif (session('completion-of-registration-material'))
    <div class="mb-12 mx-auto p-3 text-center bg-green-400 text-white w-full rounded-md" role="alert">
        {{ session('completion-of-registration-material') }}
    </div>

@elseif (session('completion-of-update-material'))
    <div class="mb-12 mx-auto p-3 text-center bg-green-400 text-white w-full rounded-md" role="alert">
        {{ session('completion-of-update-material') }}
    </div>

@elseif (session('completion-of-registration-seasoning'))
    <div class="mb-12 mx-auto p-3 text-center bg-green-400 text-white w-full rounded-md" role="alert">
        {{ session('completion-of-registration-seasoning') }}
    </div>

@elseif (session('completion-of-update-seasoning'))
    <div class="mb-12 mx-auto p-3 text-center bg-green-400 text-white w-full rounded-md" role="alert">
        {{ session('completion-of-registration-seasoning') }}
    </div>
@endif
