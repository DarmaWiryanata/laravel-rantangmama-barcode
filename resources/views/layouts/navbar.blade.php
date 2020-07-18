@if ($role->name == 'admin')
    <x-navbar-expand name='Data Master'>
        <a class="dropdown-item" href="#">Produk</a>
        <a class="dropdown-item" href="#">Produksi</a>
        <a class="dropdown-item" href="#">User</a>
    </x-navbar-expand>
    <x-navbar name='User' :route="route('admin.home')" />
@elseif ($role->name == 'executive')
    
@elseif ($role->name == 'supervisor')
    
@elseif ($role->name == 'marketing')
    
@elseif ($role->name == 'production')
    
@elseif ($role->name == 'shipping')
    
@endif