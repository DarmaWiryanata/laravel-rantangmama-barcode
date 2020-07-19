@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Produksi
                    <button type="button" class="float-right btn btn-sm btn-success" data-toggle="modal" data-target="#tambah">Tambah Produksi</button>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    18 Juli 2020
                                </td>
                                <td>
                                    BBQ CHICKEN WING MT
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-success">Cetak Barcode</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    30 Juni 2020
                                </td>
                                <td>
                                    BAKSO AYAM SUPER MT
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-success">Cetak Barcode</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    1 Juni 2020
                                </td>
                                <td>
                                    BAKSO AYAM SUPER RM
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-success">Cetak Barcode</button>
                                </td>
                            </tr>
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
                <form action="#" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="reseller">Jenis Produk</label>
                            <select class="form-control" name="reseller" id="reseller" autofocus>
                                <option>CHICKEN WING MT 8 pcs</option>
                                <option>CHICKEN WING MT12 pcs</option>
                                <option>CHICKEN WING RM 10 pcs</option>
                                <option>CHICKEN PANDAN MT 8 pcs</option>
                                <option>CHICKEN PANDAN RM 6 pcs</option>
                                <option>BAKSO AYAM MADU RM 15 pcs</option>
                                <option>BAKSO AYAM SUPER MT 15 pcs</option>
                                <option>BAKSO AYAM SUPER MT 32 Pcs</option>
                                <option>BAKSO AYAM SUPER RM 20 pcs</option>
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
                                    <input type="number" class="form-control" name="stock" id="stock">
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
