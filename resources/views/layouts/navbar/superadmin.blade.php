<x-navbar-expand name='Super Admin' status=''>
    <a class="dropdown-item" href="{{ route('admin.home') }}"><strong>Admin</strong></a>
    <a class="dropdown-item" href="{{ route('admin.member.index') }}">Member</a>
    <a class="dropdown-item" href="{{ route('admin.produk.index') }}">Produk</a>
    <a class="dropdown-item" href="{{ route('admin.produksi.index') }}">Produksi</a>
    <a class="dropdown-item" href="{{ route('admin.user.index') }}">User</a>
    <a class="dropdown-item" href="{{ route('admin.penyimpanan.index') }}">Validasi Penyimpanan</a>
    <a class="dropdown-item" href="{{ route('admin.produk-rusak') }}">Validasi Retur/Rusak</a>
    <a class="dropdown-item" href="{{ route('admin.laporan') }}">Laporan</a>
    <hr>
    <a class="dropdown-item" href="{{ route('executive.home') }}"><strong>Eksekutif</strong></a>
    <hr>
    <a class="dropdown-item" href="{{ route('supervisor.home') }}"><strong>Supervisor</strong></a>
    <hr>
    <a class="dropdown-item" href="{{ route('marketing.home') }}"><strong>Marketing</strong></a>
    <hr>
    <a class="dropdown-item" href="{{ route('production.produksi') }}"><strong>Produksi</strong></a>
    <a class="dropdown-item" href="{{ route('production.validasi') }}">Validasi Produk</a>
    <a class="dropdown-item" href="{{ route('production.barcode') }}">Cetak Barcode</a>
    <hr>
    <a class="dropdown-item" href="{{ route('shipping.index') }}"><strong>Pengiriman</strong></a>
</x-navbar-expand>