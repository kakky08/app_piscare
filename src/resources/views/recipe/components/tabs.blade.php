<ul class="nav  nav-justified profile-nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link text-muted {{ $isNew ? 'active' : '' }}"
        href="{{ route('recipe.index') }}">
        新着順
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-muted {{ $isPopular ? 'active' : '' }}"
        href="{{ route('recipe.popular') }}">
        人気順
        </a>
    </li>
</ul>
