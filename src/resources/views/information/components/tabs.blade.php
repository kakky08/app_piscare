<ul class="nav  nav-justified profile-nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link text-muted {{ $isPosts ? 'active' : '' }}"
        href="{{ route('information.show', ['name' => $information->name]) }}">
        投稿レシピ
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-muted {{ $isLikes ? 'active' : '' }}"
        href="{{ route('information.likes', ['name' => $information->name]) }}">
        いいね
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-muted {{ $isFollowings ? 'active' : '' }}"
        href="{{ route('information.followings', ['name' => $information->name]) }}">
        フォロー
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-muted {{ $isFollowers ? 'active' : '' }}"
        href="{{ route('information.followers', ['name' => $information->name]) }}">
        フォロワー
        </a>
    </li>
</ul>
