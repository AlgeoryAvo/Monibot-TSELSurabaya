
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <img src="{{ asset('storage/'.$setting[0]->logo) }}" alt="" width="45" class="img img-fluid">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">{{ $setting[0]->web }}</span>
        </a>
        <a href="javascript:void(0);"
            class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        @if(auth()->user()->level == 'Operator')

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Main Menu</span>
        </li>

        <li class="menu-item {{ (request()->segment(1) == 'operator') ? 'active' : '' }}">
            <a href="{{ route('operator') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Operator</div>
            </a>
        </li>
        <li class="menu-item {{ (request()->segment(1) == 'outlet') ? 'active' : '' }}">
            <a href="{{ route('outlet') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Outlet</div>
            </a>
        </li>
        <li class="menu-item {{ (request()->segment(1) == 'setting-website') ? 'active' : '' }}">
            <a href="{{ route('setting-website') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Analytics">Setting Website</div>
            </a>
        </li>
        @elseif (auth()->user()->level == 'Outlet')
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Main Menu</span>
        </li>
        <li class="menu-item {{ (request()->segment(1) == 'product') ? 'active' : '' }}">
            <a href="{{ route('product') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Analytics">Produk</div>
            </a>
        </li>
        @elseif (auth()->user()->level == 'Atasan')
        <li class="menu-item {{ (request()->segment(1) == 'dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ (request()->segment(1) == 'setting-website') ? 'active' : '' }}">
            <a href="{{ route('setting-website') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Analytics">Setting Website</div>
            </a>
        </li>

        @endif
    </ul>
</aside>
<!-- / Menu -->
