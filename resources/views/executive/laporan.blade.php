@extends('layouts.app')

@section('js')
    <script>
        $(document).ready( function () {
            $('#laporanTable').DataTable();

            // $('#laporanTable tbody tr td button').on('click', function() {
            //     var id = $(this).attr('data-value');
            //     console.log(id);
            //     $.get( "/admin/user/" + id, function( data ) {
            //         console.log(JSON.parse(data));
            //         var d = JSON.parse(data);
            //         $('#username').val(d.name);
            //     });
            // });
        } );
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Data laporan 
                    @if ($data->id == 1)
                        Penjualan Member
                    @else
                        Penjualan Produk
                    @endif
                    ({{ $data->awal }} - {{ $data->akhir }})
                <button type="button" class="float-right btn btn-sm btn-success" data-toggle="modal" data-target="#tanggal">Ubah Tanggal</button>
                </div>

                <div class="card-body">
                    <div class="table-responsive-xl">
                      <table class="table table-striped" id="laporanTable">
                          <thead class="thead-light">
                              <tr>
                                  <th>Nama</th>
                                  <th>Produk</th>
                                  <th>Qty</th>
                              </tr>
                          </thead>
                          <tbody>
                                <tr>
                                    <td>
                                        AFRI
                                    </td>
                                    <td>
                                        BBQ CHICKEN WING MT
                                    </td>
                                    <td>
                                        55 Pcs
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        CYNTHIA MIRANDA
                                    </td>
                                    <td>
                                        CHICKEN PANDAN MT
                                    </td>
                                    <td>
                                        30 Pcs
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        GUSTI KOMANG ADITYA
                                    </td>
                                    <td>
                                        BAKSO AYAM SUPER MT
                                    </td>
                                    <td>
                                        38 Pcs
                                    </td>
                                </tr>
                          </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.user.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>

                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Konfirmasi Password" required>
                        </div>

                        <div class="form-group">
                            <label>Status: </label>
                            <div class="controls">
                              <select class="form-control" name="role" required>
                                <option value hidden>--Pilih status</option>
                                <option value="admin">Administrator</option>
                                <option value="executive">Eksekutif</option>
                                <option value="supervisor">Supervisor Marketing</option>
                                <option value="marketing">Marketing</option>
                                <option value="production">Produksi</option>
                                <option value="shipping">Pengiriman</option>
                              </select>
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
                                    <input type="text" id="id" name="id" value="{{ $data->id }}" hidden>
                                    <div class="row justify-content-center">
                                        <div class="col-5">
                                            <label>Tanggal Batas Awal: </label>
                                            <input type="date" value="{{ $data->awal }}" name="awal" class="form-control pickadate" placeholder="Pilih Batas Awal Laporan" required data-validation-required-message="Tidak boleh kosong">
                                        </div>
                                        <div class="col-5">
                                            <label>Tanggal Batas Akhir: </label>
                                            <input type="date" value="{{ $data->akhir }}" name="akhir" class="form-control pickadate" placeholder="Pilih Batas Akhir Laporan" required data-validation-required-message="Tidak boleh kosong">
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
</div>
@endsection
