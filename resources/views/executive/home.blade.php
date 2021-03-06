@extends('layouts.app')

@section('js')
    <script>
        $(document).ready(function () {
            
            $('form').submit(function() {
                $(this).find("button[type='submit']").prop('disabled', true);
            });
            
            $('.data div div div button').on('click', function() {
                var id = $(this).attr('data-value');
                console.log(id);
                $('#id').val(id);
                $('#id1').val(id);
            });
        } );
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Laporan Live Stock</div>

                <div class="card-body">
                    <div class="card-deck-wrapper">
                        <div class="card-deck">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="card data">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Laporan Stok</h4>
                                                {{-- <p class="card-text">This card has supporting text below as a natural lead-in to
                                                    additional content.</p> --}}
                                                <div class="row justify-content-center">
                                                    <form action="{{ route('executive.showdata') }}" method="GET">
                                                        <input type="text" name="id" value="6" hidden>
                                                        <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="card data">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Laporan Stok Konsinyasi</h4>
                                                {{-- <p class="card-text">This card has supporting text below as a natural lead-in to
                                                    additional content.</p> --}}
                                                <div class="row justify-content-center">
                                                    <form action="{{ route('executive.showdata') }}" method="GET">
                                                        <input type="text" name="id" value="8" hidden>
                                                        <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="card data">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Laporan Stok Produksi</h4>
                                                {{-- <p class="card-text">This card has supporting text below as a natural lead-in to
                                                    additional content.</p> --}}
                                                <div class="row justify-content-center">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#abc" data-value="7"> Cetak Laporan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="card data">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Laporan Barang Retur & Rusak</h4>
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
                                                <h4 class="card-title text-center">Laporan Penjualan Member</h4>
                                                {{-- <p class="card-text">This card has supporting text below as a natural lead-in to
                                                    additional content.</p> --}}
                                                <div class="row justify-content-center">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tanggal" data-value="2"> Cetak Laporan</button>
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
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tanggal" data-value="3"> Cetak Laporan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="card data">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Laporan Penjualan Member (Konsinyasi)</h4>
                                                {{-- <p class="card-text">This card has supporting text below as a natural lead-in to
                                                    additional content.</p> --}}
                                                <div class="row justify-content-center">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tanggal" data-value="4"> Cetak Laporan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="card data">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Laporan Penjualan Produk (Konsinyasi)</h4>
                                                {{-- <p class="card-text">This card has supporting text below as a natural lead-in to
                                                    additional content.</p> --}}
                                                <div class="row justify-content-center">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tanggal" data-value="5"> Cetak Laporan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="card data">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Laporan Pengiriman</h4>
                                                {{-- <p class="card-text">This card has supporting text below as a natural lead-in to
                                                    additional content.</p> --}}
                                                <div class="row justify-content-center">
                                                    <form action="{{ route('executive.showdata') }}" method="GET">
                                                        <input type="text" name="id" value="9" hidden>
                                                        <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                                                    </form>
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
                <form action="{{ route('executive.showdata') }}" method="GET">
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

    {{-- Modal 1 Tanggal --}}
    <div class="modal fade text-left" id="abc" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered justify-content-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">Tanggal Laporan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('executive.showdata') }}" method="GET">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="controls">
                                <input type="text" name="id" id="id1" hidden>
                                <div class="row justify-content-center">
                                    <div class="col-5">
                                        <label>Tanggal: </label>
                                        <input type="date" name="awal" class="form-control pickadate" required data-validation-required-message="Tidak boleh kosong">
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
    {{-- / Modal 1 Tanggal --}}
</div>
@endsection