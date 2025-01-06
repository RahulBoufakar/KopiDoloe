<nav class="nav nav-pills rounded-navbar bg-dark mb-2" data-bs-theme="dark">
    <div class="container-fluid d-flex align-items-center">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="asset/kopi.png" alt="Logo" class="d-inline-block align-top" height="40">
            <span class="ms-2 text-white">Kopi Dolo</span>
        </a>
        <ul class="nav ms-auto">
            <li class="nav-item">
                <a class="nav-link active my-2" aria-current="page" href="{{route('main')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link my-2" href="{{route('pemesanan.index')}}">Pemesanan</a>
            </li>
            @auth
                @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link my-2" href="{{ route('menu.index') }}">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link my-2" href="{{ route('keuangan.index') }}">Keuangan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link my-2" href="{{ route('stoks.index') }}">Stok</a>
                </li>
                @endif
            @endauth
            @auth
                <li class="nav-item d-flex align-items-center">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu">
                            <!-- Your dropdown menu items here -->
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}" style="color: black">Profile</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item" style="color: black">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            @endauth
        </ul>
    </div>
</nav>
