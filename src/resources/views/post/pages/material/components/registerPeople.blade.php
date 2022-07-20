<form method="POST" action="{{ route('post.people.store') }}" id="number-of-people-register-form">
    @csrf
    <div class="row cols-3 material-register-form-tag">
        <div class="col-1"></div>
        <p class="col">何人分の材料か登録</p>
        <div class="col-1"></div>
    </div>
    {{-- @if($errors->has('update_people'))
        <div class="row cols-3 spacing-reset">
            <div class="col-1"></div>
            <p class="col alert-message-error">※{{ $errors->first('update_people') }}</p>
            <div class="col-1"></div>
        </div>
    @endif --}}
    <div class="row cols-3 spacing-reset material-form">
        <div class="col-1"></div>
        <input
            type="hidden"
            name="post_id"
            value="{{ $postId }}"
        >
        <input
            type="hidden"
            name="user"
            value="{{ $user->id }}"
        >
        @if (empty($people))
            <input
                type="text"
                class="form-control col"
                name="people"
                placeholder="何人分"
            >
        @else
            <input
                type="text"
                class="form-control col"
                name="people"
                placeholder="何人分"
                value={{ $people->people }}
            >
        @endif
        <button type="submit" form="number-of-people-register-form" class="btn col-1 post-edit-button">人数を登録</button>
    </div>
</form>
