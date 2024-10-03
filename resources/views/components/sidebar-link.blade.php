@props(['text'])
<li class="menu-item {{ Request::is($text) || Request::is($text . '/*') ? 'active' : '' }}">
    <a href="{{ route($text . '.index') }}" class="menu-link">
        {{ $icon }}
        <div data-i18n="Analytics " class="text-capitalize">{{ $text }}</div>
    </a>
</li>
