<nav class="navbar navbar-expand-lg nav-header">
    <div class="container-fluid nav-height">
        <div>
            <a class="navbar-brand nav-icon" href="{{ route('home.index') }}">Piscare</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

            <ul class="nav justify-content-end nav-list">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('recipe.index') }}"><span class="{{  $page === 'recipe' ? 'header-active' : '' }}">レシピ検索</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post.index') }}"><span class="{{  $page === 'post' ? 'header-active' : '' }}">投稿レシピ</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shop.index') }}"><span class="{{  $page === 'shop' ? 'header-active' : '' }}">お店検索</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $user->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('home.index') }}">マイページ</a></li>
                        <li><a class="dropdown-item" href="{{ route('post.create') }}">レシピ投稿</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                            >
                                ログアウト
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
    </div>
</nav>
