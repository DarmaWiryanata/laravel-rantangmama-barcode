<x-navbar-expand name='Admin' status=''>
  <a class="dropdown-item" href="{{ route('admin.member.index') }}">Member</a>
  <a class="dropdown-item" href="{{ route('admin.produk.index') }}">Produk</a>
  <a class="dropdown-item" href="{{ route('admin.produksi.index') }}">Produksi</a>
  <a class="dropdown-item" href="{{ route('admin.user.index') }}">User</a>
  <a class="dropdown-item" href="{{ route('admin.penyimpanan.index') }}">Validasi Penyimpanan</a>
  <a class="dropdown-item" href="{{ route('admin.produk-rusak') }}">Validasi Retur/Rusak</a>
  <a class="dropdown-item" href="{{ route('admin.laporan') }}">Laporan</a>
</x-navbar-expand>