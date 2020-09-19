@extends('layouts.app')

@section('js')
    <script>
        $(document).ready( function () {
            $('#memberTable').DataTable();

            $(document).on('click', '#memberTable tbody tr td button', function(e) {
                var id = $(this).attr('data-value');
                $.get( "/admin/member/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#id').val(d.id);
                    $('#code').val(d.code);
                    $('#name').val(d.name);
                    $('#bank').val(d.bank);
                    $('#status').val(d.status);
                    $('#address').val(d.address);
                });
            });

            $('#memberTable tbody tr td a').on('click', function() {
                var id = $(this).attr('data-value');
                console.log(id);
                $.get( "/admin/member/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#code-text').text(d.code);
                    $('#judul-text').text(d.name);
                    $('#name-text').text(d.name);
                    $('#bank-text').text(d.bank);
                    $('#status-text').text(d.status);
                    $('#address-text').text(d.address);
                });
                $.get( "/admin/member/member-sale-today/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#sale-today tr').remove();
                    for (var i = 0; i < d.length; i++) {
                        if (d[i].name !== "Kosong") {
                            $('#sale-today').append(
                                                `<tr>
                                                    <td>`+ d[i].name +`</td>
                                                    <td>`+ d[i].qty +`</td>
                                                </tr>`);
                        }
                    }
                });
                $.get( "/admin/member/member-sale/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#sale tr').remove();
                    for (var i = 0; i < d.length; i++) { 
                        console.log(d[i].name);  
                        if (d[i].name !== "Kosong") {
                            $('#sale').append(
                                                `<tr>
                                                    <td>`+ d[i].name +`</td>
                                                    <td>`+ d[i].qty +`</td>
                                                </tr>`);
                        }
                    }
                });
            });
        });
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
                                  <th>Nama</th>
                                  <th>Kode</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($member as $item) 
                                <tr>
                                    <td>
                                        <a href="#modal" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->name }}</a>
                                    </td>
                                    <td>
                                        {{ $item->code }}
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.member.destroy', $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#ubah" data-value="{{ $item->id }}">Ubah</span>
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
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="judul-text">[Nama Member]</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="memberDetail">
                        <dl class="row">
                            <dt class="col-sm-3">Nama</dt>
                            <dd class="col-sm-9" id="name-text">Fusce dapibus</dd>                          
                            
                            <dt class="col-sm-3">Kode</dt>
                            <dd class="col-sm-9" id="code-text">Fusce dapibus</dd>                          
                            
                            <dt class="col-sm-3">Alamat</dt>
                            <dd class="col-sm-9" id="address-text">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>                          
                            
                            <dt class="col-sm-3">Bank</dt>
                            <dd class="col-sm-9" id="bank-text">Fusce dapibus</dd>                          
                            
                            <dt class="col-sm-3">Status</dt>
                            <dd class="col-sm-9" id="status-text">Fusce dapibus</dd>                          
                        </dl>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="hari-ini-tab" data-toggle="tab" href="#hari-ini" role="tab" aria-controls="home" aria-selected="true">Hari Ini</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="keseluruhan-tab" data-toggle="tab" href="#keseluruhan" role="tab" aria-controls="profile" aria-selected="false">Keseluruhan</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="hari-ini" role="tabpanel" aria-labelledby="home-tab">
                                <table class="table table-striped" id="hari-ini-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nama</th>
                                            <th>Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sale-today">
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="keseluruhan" role="tabpanel" aria-labelledby="keseluruhan-tab">
                                <table class="table table-striped" id="keseluruhan-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nama</th>
                                            <th>Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sale">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Member</h5>
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
                              <select class="form-control" name="status" required>
                                <option value hidden>--Pilih status</option>  
                                <option value="Dropship">Dropship</option>  
                                <option value="Reseller">Reseller</option>
                                <option value="Mitra Usaha">Mitra Usaha</option>
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
                <form action="{{ route('admin.member.update', Auth::user()->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <input id="id" name="id" hidden>
                        <div class="form-group">
                          <label>Kode</label>
                          <input type="text" class="form-control" name="code" id="code" placeholder="Kode Member" required>
                      </div>

                      <div class="form-group">
                          <label>Nama</label>
                          <input type="text" class="form-control" name="name" id="name" placeholder="Nama Member" required>
                      </div>

                      <div class="form-group">
                          <label>Bank</label>
                          <input type="name" class="form-control" name="bank" id="bank" placeholder="Kosong">
                      </div>

                      <div class="form-group">
                        <label>Status: </label>
                        <div class="controls">
                          <select class="form-control" name="status" id="status" required>
                            <option value="Dropship">Dropship</option>  
                            <option value="Reseller">Reseller</option>
                            <option value="Mitra Usaha">Mitra Usaha</option>
                      </select>
                        </div>
                    </div>

                      <div class="form-group">
                          <label>Alamat</label>
                          <textarea name="address" id="address" class="form-control" cols="30" rows="5" placeholder="Alamat Member" required></textarea>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
