<nav class="navbar navbar-expand-lg main-navbar" style="background-color: #54B3BA;">
    <div class="container-fluid">
        <a href="{{ route('home') }}" class="navbar-brand sidebar-gone-hide">
            <img src="{{ asset('img/logo.png') }}" class="mx-4" width="55">
        </a>
        <div class="nav-collapse w-100">
            <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                <i class="fas fa-ellipsis-v"></i>
            </a>
            <ul class="navbar-nav" style="font-size: 15px;">
                <li class="nav-item {{ isset($page) ? $page->slug === 'beranda' ? 'active' : '' : '' }}">
                    <a href="{{ route('home') }}" class="nav-link">Beranda</a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() === 'home.map' ? 'active' : '' }}">
                    <a href="{{ route('home.map') }}" class="nav-link">Peta</a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() === 'home.blog' ? 'active' : '' }}">
                    <a href="{{ route('home.blog') }}" class="nav-link">Berita</a>
                </li>
                <li class="nav-item {{ isset($page) ? $page->slug === 'tentang' ? 'active' : '' : '' }}">
                    <a href="{{ route('home', ['tentang']) }}" class="nav-link">Tentang</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Login
                </a>
                <div class="dropdown-menu p-3 pb-2 ml-auto" style="right: 1em">
                    <form class="form-horizontal" action="{{ route('login') }}" method="post">
                        @csrf
                        <input class="form-control mb-2" type="email" name="email" placeholder="Email">
                        <input class="form-control mb-4" type="password" name="password" placeholder="Password">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </ul>
        </div>
    </div>
</nav>
