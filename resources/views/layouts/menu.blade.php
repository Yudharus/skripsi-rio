<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" >
        <p>Dashboard</p>
    </a>
    <a href="{{ route('user') }}" >
        <p>User</p>
    </a>
    <a href="{{ route('obat') }}" >
        <p>Obat</p>
    </a>
    <a href="{{ route('obat_masuk') }}" >
        <p>Obat Masuk</p>
    </a>
    <a href="{{ route('obat_keluar') }}" >
        <p>Obat Keluar</p>
    </a>
    <a href="{{ route('ropeoq') }}" >
        <p>ROP dan EOQ</p>
    </a>
    <a href="#"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
</li>
