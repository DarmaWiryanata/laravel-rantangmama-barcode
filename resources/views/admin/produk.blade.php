@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('custom.product') }}
                <div class="float-right btn btn-sm btn-success">ajhsdgasdgasjhds</div>
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
                            </tr>
                            <tr>
                                <td>
                                    BBQ CHICKEN WING MT12 pcs
                                </td>
                                <td>
                                    12
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BBQ CHICKEN WING RM 10 pcs
                                </td>
                                <td>
                                    12
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    CHICKEN PANDAN MT 8 pcs
                                </td>
                                <td>
                                    12
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    CHICKEN PANDAN RM 6 pcs
                                </td>
                                <td>
                                    12
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BAKSO AYAM MADU RM 15 pcs
                                </td>
                                <td>
                                    12
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BAKSO AYAM SUPER MT 15 pcs
                                </td>
                                <td>
                                    12
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BAKSO AYAM SUPER MT 32 Pcs
                                </td>
                                <td>
                                    12
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BAKSO AYAM SUPER RM 20 pcs 
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
