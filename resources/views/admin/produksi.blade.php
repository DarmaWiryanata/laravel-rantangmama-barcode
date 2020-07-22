@extends('layouts.app')

@section('js')
    <script>
        $(document).ready( function () {
            $('#productionTable').DataTable();
        } );
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Produksi
                    <button type="button" class="float-right btn btn-sm btn-success" data-toggle="modal" data-target="#tambah">Tambah Produksi</button>
                </div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
                            {{ $message }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-block">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <table class="table table-striped" id="productionTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Tanggal Produksi</th>
                                <th>Tanggal Kadaluwarsa</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($production as $item)
                                <tr>
                                    <td>
                                        {{ Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y') }}
                                    </td>
                                    <td>
                                        {{ Carbon\Carbon::parse($item->expire_date)->diffForHumans() }}
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{ $item->qty }}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-success">Cetak Barcode</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="#">
                    @csrf
                    
                </form>
                <form action="{{ route('admin.produksi.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="product_id">Jenis Produk</label>
                            <select class="form-control" name="product_id" id="product_id" autofocus>
                                <option value hidden>--Pilih Produk</option>
                                @foreach ($product as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="expire_date">Tanggal Kadaluwarsa</label>
                            <input type="date" class="form-control" name="expire_date" id="expire_date">
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="stock">Jumlah</label>
                                    <input type="number" class="form-control" name="stock" id="stock" min="1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection