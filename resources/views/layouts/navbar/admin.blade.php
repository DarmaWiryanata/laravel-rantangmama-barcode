<x-navbar-expand name='Data Master' status=''>
  <a class="dropdown-item" href="{{ route('admin.member.index') }}">Member</a>
  <a class="dropdown-item" href="{{ route('admin.penyimpanan.index') }}">Penyimpanan</a>
  <a class="dropdown-item" href="{{ route('admin.produk-rusak') }}">Produk Retur & Rusak</a>
  <a class="dropdown-item" href="{{ route('admin.produk.index') }}">Produk</a>
  <a class="dropdown-item" href="{{ route('admin.produksi.index') }}">Produksi</a>
  <a class="dropdown-item" href="{{ route('admin.user.index') }}">User</a>
</x-navbar-expand>
