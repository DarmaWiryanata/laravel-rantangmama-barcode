@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('custom.product') }}
                <button type="button" class="float-right btn btn-sm btn-success" data-toggle="modal" data-target="#tambah">Tambah Produk</button>
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
                                <th>Nama</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    BBQ CHICKEN WING MT 8 pcs
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    <form method="POST" action="#">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubah" >Ubah</span>
                                        <button type="submit" class="ml-1 btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BBQ CHICKEN WING MT12 pcs
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    <form method="POST" action="#">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubah" >Ubah</span>
                                        <button type="submit" class="ml-1 btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BBQ CHICKEN WING RM 10 pcs
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    <form method="POST" action="#">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubah" >Ubah</span>
                                        <button type="submit" class="ml-1 btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    CHICKEN PANDAN MT 8 pcs
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    <form method="POST" action="#">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubah" >Ubah</span>
                                        <button type="submit" class="ml-1 btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    CHICKEN PANDAN RM 6 pcs
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    <form method="POST" action="#">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubah" >Ubah</span>
                                        <button type="submit" class="ml-1 btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BAKSO AYAM MADU RM 15 pcs
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    <form method="POST" action="#">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubah" >Ubah</span>
                                        <button type="submit" class="ml-1 btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BAKSO AYAM SUPER MT 15 pcs
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    <form method="POST" action="#">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubah" >Ubah</span>
                                        <button type="submit" class="ml-1 btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BAKSO AYAM SUPER MT 32 Pcs
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    <form method="POST" action="#">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubah" >Ubah</span>
                                        <button type="submit" class="ml-1 btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BAKSO AYAM SUPER RM 20 pcs 
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    <form method="POST" action="#">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubah" >Ubah</span>
                                        <button type="submit" class="ml-1 btn btn-sm btn-danger">Hapus</button>
                                    </form>
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
                <form action="#" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="name" class="form-control" name="nama" placeholder="Nama Produk">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="name" class="form-control" name="nama" value="BBQ CHICKEN WING MT" placeholder="Nama Produk">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
