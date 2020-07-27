@extends('layouts.app')

@section('js')
    <script>
        $(document).ready( function () {
                $('.data div div div button').on('click', function() {
                var id = $(this).attr('data-value');
                console.log(id);
                $('#id').val(id);
            });
        } );
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Laporan</div>

                <div class="card-body">
                    <div class="card-deck-wrapper">
                        <div class="card-deck">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="card data">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Laporan Penjualan Member</h4>
                                                {{-- <p class="card-text">This card has supporting text below as a natural lead-in to
                                                    additional content.</p> --}}
                                                <div class="row justify-content-center">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tanggal" data-value="1"> Cetak Laporan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="card data">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Laporan Penjualan Produk</h4>
                                                {{-- <p class="card-text">This card has supporting text below as a natural lead-in to
                                                    additional content.</p> --}}
                                                <div class="row justify-content-center">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tanggal" data-value="2"> Cetak Laporan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tanggal --}}
    <div class="modal fade text-left" id="tanggal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered justify-content-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">Tanggal Laporan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('executive.show') }}" method="POST" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="controls">
                                <input type="text" id="id" name="id" hidden>
                                <div class="row justify-content-center">
                                    <div class="col-5">
                                        <label>Tanggal Batas Awal: </label>
                                        <input type="date" name="awal" class="form-control pickadate" placeholder="Pilih Batas Awal Laporan" required data-validation-required-message="Tidak boleh kosong">
                                    </div>
                                    <div class="col-5">
                                        <label>Tanggal Batas Akhir: </label>
                                        <input type="date" name="akhir" class="form-control pickadate" placeholder="Pilih Batas Akhir Laporan" required data-validation-required-message="Tidak boleh kosong">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- / Modal Tanggal --}}
</div>
@endsection