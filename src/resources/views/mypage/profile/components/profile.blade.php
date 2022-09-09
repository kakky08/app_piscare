<h1 class="text-5xl mb-16">Profile</h1>

<div class="flex flex-1 items-center p-4 mb-12">
    <div class="flex flex-col justify-center items-center mr-10">
        <a href="#" class="block relative">
            @if (empty($user->icon))
                <img src="{{ asset('images/yellowtail.png') }}" class="profile-icon w-40 h-40" alt="{{$user->name}}の初期アイコン">
            @else
                <img src="https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/{{ $user->icon }}" class="profile-icon w-40 h-40" alt="{{$user->name}}のアイコン">
            @endif
        </a>
    </div>
    <div class="flex-1 pl-1 md:mr-16">
        <div class="font-medium text-4xl mb-2">
            {{ $user->name }}
        </div>
        <div class="flex flex-wrap">
            <a href="{{ route('profile.followings', ['name' => $user->name]) }}" class="text-gray-600 text-lg mr-2">
                @if ( empty($user->count_followings))
                    0 フォロー
                @else
                    {{ $user->count_followings }}フォロー
                @endif
            </a>
            <a href="{{ route('profile.followers', ['name' => $user->name]) }}" class="text-gray-600 text-lg mr-8">
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
