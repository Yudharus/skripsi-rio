<!-- need to remove -->
<li class="nav-item">
    @if(Auth::user()->bagian == 'Apoteker')
        <a href="{{ route('home') }}" >
            <p>Klinik</p>
        </a>
        <a href="{{ route('user') }}" >
            <p>User</p>
        </a>
        <a href="{{ route('obat') }}" >
            <p>Daftar Obat</p>
        </a>
        <a href="{{ route('stok_obat') }}" >
            <p>Stok Obat</p>
        </a>
        <a href="{{ route('supplier') }}" >
            <p>Supplier</p>
        </a>
        <a href="{{ route('obat_masuk') }}" >
            <p>Obat Masuk</p>
        </a>
        <a href="{{ route('obat_keluar') }}" >
            <p>Obat Keluar</p>
        </a>
        <a href="{{ route('ropeoq') }}" >
            <p>Pemesanan ( ROP EOQ )
            </p>
        </a>
    @endif
    @if(Auth::user()->bagian == 'Administrator')
        <a href="{{ route('home') }}" >
            <p>Dashboard</p>
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
    @endif
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Log out</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        </form>
</li>
