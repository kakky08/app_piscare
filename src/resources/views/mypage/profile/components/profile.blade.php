<h1 class="mypage-title">Profile</h1>

<div class="profile-section row">
    <div class="profile-block">
        @if (empty($user->icon))
            <img src="{{ asset('images/yellowtail.png') }}" class="profile-icon" alt="{{$user->name}}の初期アイコン">
        @else
            <i class="fas fa-user-circle fa-10x"></i>
        @endif
    </div>

    <div class="profile-block">
        <div>
            <h2 class="profile-name">
                <a href="#" class="text-dark">
                    {{ $user->name }}
                </a>
            </h2>
        </div>
        <div class="card-text">
            <a href="{{ route('profile.followings', ['name' => $user->name]) }}" class="text-muted">
                @if ( empty($user->count_followings))
                    0 フォロー
                @else
                    {{ $user->count_followings }}フォロー
                @endif
            </a>
            <a href="{{ route('profile.followers', ['name' => $user->name]) }}" class="text-muted">
                @if ( empty($user->count_followers))
                    0 フォロワー
                @else
                    {{ $user->count_followers }} フォロワー
                @endif
            </a>
        </div>
    </div>

    <div class="profile-block">
        @if(Auth::id() !== $user->id)
            <follow-button
            class="ml-auto"
            :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
            :authorized='@json(Auth::check())'
            endpoint='{{ route('user.follow', ['id' => $user->id]) }}'
            >
            </follow-button>
        @endif
    </div>
</div>
