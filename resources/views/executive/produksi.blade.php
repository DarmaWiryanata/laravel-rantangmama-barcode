@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Produksi</div>

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
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
