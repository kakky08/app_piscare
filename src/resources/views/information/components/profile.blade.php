<h1 class="text-5xl mb-16">Profile</h1>

<div class="flex flex-1 items-center p-4 mb-12">
    <div class="flex flex-col justify-center items-center mr-10">
        <a href="#" class="block relative">
            @if (empty( $information->icon))
                <img src="{{ asset('images/yellowtail.png') }}" class="profile-icon w-40 h-40" alt="{{ $information->name}}の初期アイコン">
            @else
                <img src="https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/{{  $information->icon }}" class="profile-icon w-40 h-40" alt="{{ $information->name}}のアイコン">
            @endif
        </a>
    </div>
    <div class="flex-1 pl-1 md:mr-16">
        <div class="font-medium text-4xl mb-2">
            {{  $information->name }}
        </div>
        <div class="flex flex-wrap">
            <a href="{{ route('profile.followings', ['name' =>  $information->name]) }}" class="text-gray-600 text-lg mr-2">
                @if ( empty( $information->count_followings))
                    0 フォロー
                @else
                    {{  $information->count_followings }}フォロー
                @endif
            </a>
            <a href="{{ route('profile.followers', ['name' =>  $information->name]) }}" class="text-gray-600 text-lg mr-8">
                @if ( empty( $information->count_followers))
                    0 フォロワー
                @else
                    {{  $information->count_followers }} フォロワー
                @endif
            </a>
        </div>
    </div>
    <div class="profile-block">
        @if(Auth::id() !==  $information->id)
        <follow-button
            class="ml-auto"
            :initial-is-followed-by='@json( $information->isFollowedBy(Auth::user()))'
            :authorized='@json(Auth::check())'
            endpoint='{{ route('user.follow', ['id' =>  $information->id]) }}'
            >
        </follow-button>
        @endif
    </div>
</div>
