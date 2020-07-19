@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Produk Konsinyasi</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Member</th>
                                <th>Tujuan</th>
                                <th>Tanggal Pengiriman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Agen A
                                </td>
                                <td>
                                    Ubud
                                </td>
                                <td>
                                    {{ now() }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail">Lihat Detail</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Agen B
                                </td>
                                <td>
                                    Denpasar
                                </td>
                                <td>
                                    {{ now() }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail">Lihat Detail</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Agen C
                                </td>
                                <td>
                                    Denpasar
                                </td>
                                <td>
                                    {{ now() }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail">Lihat Detail</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Agen D
                                </td>
                                <td>
                                    Tabanan
                                </td>
                                <td>
                                    {{ now() }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail">Lihat Detail</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Agen E
                                </td>
                                <td>
                                    Denpasar
                                </td>
                                <td>
                                    {{ now() }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail">Lihat Detail</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Agen F
                                </td>
                                <td>
                                    Tabanan
                                </td>
                                <td>
                                    {{ now() }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail">Lihat Detail</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="detail" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input disabled type="name" class="form-control" name="nama" value="Agen A" placeholder="<Kosong>">
                    </div>

                    <div class="form-group">
                        <label>Tujuan</label>
                        <input disabled type="name" class="form-control" name="tujuan" value="Ubud" placeholder="<Kosong>">
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input disabled type="name" class="form-control" name="tanggal" value="2020-07-19 12:39:07" placeholder="<Kosong>">
                    </div>

                    <hr>
                    <label>Ubah Data Penjualan</label>
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama</th>
                                <th>Sisa Stok</th>
                                <th style="width: 43px;">Terjual</th>
                                <th style="width: 67px;">Retur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    BBQ CHICKEN WING MT
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    <input type="name" class="form-control" name="terjual[]" placeholder="0">
                                </td>
                                <td>
                                    <input type="name" class="form-control" name="retur[]" placeholder="0">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BBQ CHICKEN WING RM
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    <input type="name" class="form-control" name="terjual[]" placeholder="0">
                                </td>
                                <td>
                                    <input type="name" class="form-control" name="retur[]" placeholder="0">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
