@extends('layouts.app')

@section('navbar')
    <x-navbar name='Produk' :route="route('supervisor.produk')" status='active' />
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('custom.product') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Agen</th>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
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
        </tbody>
    </table>
    </div>
  </div>
</div>
@endsection
