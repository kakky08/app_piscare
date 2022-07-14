<ul class="mypage-sidebar">
    <li>
        <a class="nav-link mypage-menu{{--  {{  $page === 'home' ? 'active' : '' }} --}}" aria-current="page" href="{{ route('home.index') }}">
            <h3 class="ml-2"><i class="fas fa-home mypage-sidebar-icon"></i>Home</h3>
        </a>
    </li>
    <li>
        <a class="nav-link mypage-menu {{-- {{  $page === 'mypage' ? 'active' : '' }} --}}" aria-current="page" href="{{ route('profile.show', ['name' => $user->name]) }}">
            <h3 class="ml-2"><i class="fas fa-user mypage-sidebar-icon"></i>Profile</h3>
        </a>
    </li>
    <li>
        <a class="nav-link mypage-menu {{-- {{  $page === 'setting' ? 'active' : '' }} --}}" href="{{ route('setting.index') }}">
            <h3 class="ml-2"><i class="fas fa-cog mypage-sidebar-icon"></i>Setting</h3>
        </a>
    </li>
    <li>
        <a class="nav-link mypage-menu {{-- {{  $page === 'privacy' ? 'active' : '' }} --}}" href="{{-- {{ route('privacy.index') }} --}}">
            <h3 class="ml-2"><i class="fas fa-user-shield mypage-sidebar-icon"></i>Privacy</h3>
        </a>
    </li>
    <li>
        <a class="nav-link mypage-menu {{-- {{  $page === 'data' ? 'active' : '' }} --}}" href="#">
            <h3 class="ml-2"><i class="fas fa-database mypage-sidebar-icon"></i>Data</h3>
        </a>
    </li>
</ul>
