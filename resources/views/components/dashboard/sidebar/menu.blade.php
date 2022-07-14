<li class="nav-item {{ Route::currentRouteName() === $href ? 'active' : '' }}">
    <a href="{{ route($href) }}" class="nav-link">
        <i class="{{ $icon }}"></i>
        <span>{{ $name }}</span>
    </a>
</li>
