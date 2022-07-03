<div class="row">
    <div>
        <a href="" class="text-dark">
        <i class="fas fa-user-circle fa-5x"></i>
        </a>
    </div>
    <div>
        <h2 class="h5 card-title m-0">
            <a href="" class="text-dark">
               kakky{{--  {{ $user->name }} --}}
            </a>
        </h2>
        <div class="card-text">
            <a href="{{-- {{ route('profile.followings', ['name' => $user->name]) }} --}}" class="text-muted">
                {{-- {{ $user->count_followings }} --}}フォロー
            </a>
            <a href="{{-- {{ route('profile.followers', ['name' => $user->name]) }} --}}" class="text-muted">
                {{-- {{ $user->count_followers }} --}} フォロワー
            </a>
        </div>
    </div>
</div>
