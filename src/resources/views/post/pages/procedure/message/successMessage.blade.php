@if (session('completion-of-registration-procedure'))
    <div class="mb-12 mx-auto p-3 text-center bg-green-400 text-white w-full rounded-md" role="alert">
        {{ session('completion-of-registration-procedure') }}
    </div>

@elseif (session('completion-of-update-procedure'))
    <div class="mb-12 mx-auto p-3 text-center bg-green-400 text-white w-full rounded-md" role="alert">
        {{ session('completion-of-update-procedure') }}
    </div>

@elseif (session('completion-of-sort-procedure'))
    <div class="mb-12 mx-auto p-3 text-center bg-green-400 text-white w-full rounded-md" role="alert">
        {{ session('completion-of-sort-procedure') }}
    </div>

@elseif (session('completion-of-destroy-procedure'))
    <div class="mb-12 mx-auto p-3 text-center bg-green-400 text-white w-full rounded-md" role="alert">
        {{ session('completion-of-destroy-procedure') }}
    </div>

@endif
