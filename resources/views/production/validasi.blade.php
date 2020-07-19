@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">Validasi Produk</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times text-white"></i></button>
                            {{ $message }}
                        </div>
                    @endif

                    <form method="POST" action="#">
                        @csrf
                        <div class="form-group">
                            <label for="barcode">Kode</label>
                            <input type="text" class="form-control" name="barcode" id="barcode" autofocus>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Riwayat Validasi Produksi</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    SDA123213
                                </td>
                                <td>
                                    BBQ CHICKEN WING MT
                                </td>
                                <td>
                                    18 Juli 2020
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    SJK1232123
                                </td>
                                <td>
                                    BAKSO AYAM SUPER MT
                                </td>
                                <td>
                                    30 Juni 2020
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    HEB12312321
                                </td>
                                <td>
                                    BAKSO AYAM SUPER RM
                                </td>
                                <td>
                                    1 Juni 2020
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection