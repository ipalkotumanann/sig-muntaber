<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">SIG Muntaber</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">Muntaber</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <x-dashboard.sidebar.menu
                name="Dashboard"
                href="dashboard"
                icon="fas fa-fire"
            />
            <li class="menu-header">Data</li>
            <x-dashboard.sidebar.menu
                name="Kasus"
                href="dashboard.case"
                icon="fas fa-user-injured"
            />
            <x-dashboard.sidebar.menu
                name="PUSKESMAS"
                href="dashboard.clinic"
                icon="fas fa-hospital"
            />
            <x-dashboard.sidebar.menu
                name="Kecamatan"
                href="dashboard.district"
                icon="fas fa-map-marked-alt"
            />
            <x-dashboard.sidebar.menu
                name="Halaman"
                href="dashboard.page"
                icon="far fa-file-alt"
            />
            <x-dashboard.sidebar.menu
                name="Berita"
                href="dashboard.blog"
                icon="far fa-newspaper"
            />
            <x-dashboard.sidebar.menu
                name="Kategori"
                href="dashboard.category"
                icon="fas fa-tags"
            />
            <x-dashboard.sidebar.menu
                name="Admin"
                href="dashboard.user"
                icon="fas fa-users"
            />
            <li class="menu-header">Other</li>
            <x-dashboard.sidebar.menu
                name="Logout"
                href="logout"
                icon="fas fa-sign-out-alt"
            />
        </ul>
    </aside>
</div>
