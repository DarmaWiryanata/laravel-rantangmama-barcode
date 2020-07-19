@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Data Member
                <button type="button" class="float-right btn btn-sm btn-success" data-toggle="modal" data-target="#tambah">Tambah Member</button>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive-xl">
                      <table class="table table-striped">
                          <thead class="thead-light">
                              <tr>
                                  <th>Kode</th>
                                  <th>Nama</th>
                                  <th>Alamat</th>
                                  <th>Status</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>
                                      RCH12313123
                                  </td>
                                  <td>
                                      Agen A
                                  </td>
                                  <td>
                                      Padang Tegal, Jl. Hanoman, Ubud, Kecamatan Ubud, Kabupaten Gianyar, Bali 80571
                                  </td>
                                  <td>
                                      Dropship
                                  </td>
                                  <td>
                                      <form method="POST" action="#">
                                          @method('DELETE')
                                          @csrf
                                          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubah" >Ubah</span>
                                          <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                      </form>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      DCK129371293
                                  </td>
                                  <td>
                                      Agen B
                                  </td>
                                  <td>
                                      Jalan Raya Abang Desa Adat, Ababi, Abang, Kabupaten Karangasem, Bali 80852
                                  </td>
                                  <td>
                                      Reseller
                                  </td>
                                  <td>
                                      <form method="POST" action="#">
                                          @method('DELETE')
                                          @csrf
                                          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubah" >Ubah</span>
                                          <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                      </form>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      DKA1231932
                                  </td>
                                  <td>
                                      Agen C
                                  </td>
                                  <td>
                                      Jl. Raya Kintamani, Batur Sel., Kec. Kintamani, Kabupaten Bangli, Bali 80652
                                  </td>
                                  <td>
                                      Mitra Usaha
                                  </td>
                                  <td>
                                      <form method="POST" action="#">
                                          @method('DELETE')
                                          @csrf
                                          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubah" >Ubah</span>
                                          <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                      </form>
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
                            <input type="name" class="form-control" name="nama" placeholder="Nama Member">
                        </div>

                        <div class="form-group">
                            <label>Status: </label>
                            <div class="controls">
                              <select class="form-control" name="status" id="status">
                                <option value="1">Dropship</option>  
                                <option value="2">Reseller</option>
                                <option value="3">Mitra Usaha</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" id="" cols="30" rows="5" placeholder="Alamat Member"></textarea>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="post">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                          <label>Nama</label>
                          <input type="name" class="form-control" name="nama" value="Agen A" placeholder="Nama Member">
                      </div>

                      <div class="form-group">
                        <label>Status: </label>
                        <div class="controls">
                          <select class="form-control" name="status" id="status">
                            <option value="1">Dropship</option>  
                            <option value="2">Reseller</option>
                            <option value="3">Mitra Usaha</option>
                          </select>
                        </div>
                    </div>

                      <div class="form-group">
                          <label>Alamat</label>
                          <textarea name="alamat" class="form-control" id="" cols="30" rows="5" placeholder="Alamat Member">Padang Tegal, Jl. Hanoman, Ubud, Kecamatan Ubud, Kabupaten Gianyar, Bali 80571</textarea>
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
