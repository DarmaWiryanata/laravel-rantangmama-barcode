@extends('layouts.app')

@section('js')
    <script>
        $(document).ready( function () {
            $('#productsTable').DataTable();
        } );
    </script>
@endsection

@section('navbar')
    <x-navbar-expand name='Data Master' status=''>
        <a class="dropdown-item" href="#">Produk</a>
        <a class="dropdown-item" href="#">Produksi</a>
        <a class="dropdown-item" href="#">User</a>
    </x-navbar-expand>
    <x-navbar name='User' :route="route('admin.home')" status='' />
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @empty($products)
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in') }} as {{ $role->description }}!
                    @else
                        <div class="table-responsive-xl">
                            <table class="table table-striped" id="productsTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Jenis</th>
                                        <th>Kode</th>
                                        <th>Tanggal Kadaluwarsa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $item) 
                                    <tr>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            {{ $item->code }}
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($item->expire_date)->formatLocalized('%d %B %Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endempty
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
