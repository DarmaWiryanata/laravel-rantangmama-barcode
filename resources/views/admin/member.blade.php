@extends('layouts.app')

@section('js')
    <script>
        $(document).ready( function () {
            $('#memberTable').DataTable();
        } );
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Data Member
                <button type="button" class="float-right btn btn-sm btn-success" data-toggle="modal" data-target="#tambah">Tambah Member</button>
                </div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
                            {{ $message }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-block">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="table-responsive-xl">
                      <table class="table table-striped" id="memberTable">
                          <thead class="thead-light">
                              <tr>
                                  <th>Kode</th>
                                  <th>Nama</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($member as $item) 
                                <tr>
                                    <td>
                                        {{ $item->code }}
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        <form method="POST" action="#">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#ubah" >Ubah</span>
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
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
                <form action="{{ route('admin.member.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="name" class="form-control" name="name" placeholder="Nama Member" required>
                        </div>

                        <div class="form-group">
                            <label>Bank</label>
                            <input type="name" class="form-control" name="bank" placeholder="Nama Bank">
                        </div>

                        <div class="form-group">
                            <label>Status: </label>
                            <div class="controls">
                              <select class="form-control" name="status" id="status" required>
                                <option value hidden>--Pilih status</option>  
                                <option value="1">Dropship</option>  
                                <option value="2">Reseller</option>
                                <option value="3">Mitra Usaha</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="address" class="form-control" id="" cols="30" rows="5" placeholder="Alamat Member" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
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
                <form action="{{ route('admin.member.update') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input value='id' hidden>
                        <div class="form-group">
                          <label>Kode</label>
                          <input type="text" class="form-control" name="code" id="code" value="Agen A" placeholder="Kode Member" required>
                      </div>

                      <div class="form-group">
                          <label>Nama</label>
                          <input type="text" class="form-control" name="name" id="name" value="Agen A" placeholder="Nama Member" required>
                      </div>

                      <div class="form-group">
                          <label>Bank</label>
                          <input type="name" class="form-control" name="bank" id="name" value="BRI" placeholder="Nama Bank">
                      </div>

                      <div class="form-group">
                        <label>Status: </label>
                        <div class="controls">
                          <select class="form-control" name="status" id="status" required>
                            <option value="1">Dropship</option>  
                            <option value="2">Reseller</option>
                            <option value="3">Mitra Usaha</option>
                          </select>
                        </div>
                    </div>

                      <div class="form-group">
                          <label>Alamat</label>
                          <textarea name="address" id="address" class="form-control" id="" cols="30" rows="5" placeholder="Alamat Member" required>Padang Tegal, Jl. Hanoman, Ubud, Kecamatan Ubud, Kabupaten Gianyar, Bali 80571</textarea>
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
