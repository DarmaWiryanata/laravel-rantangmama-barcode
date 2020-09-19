@extends('layouts.app')

@section('js')
    <script>
        $(document).ready( function () {
            $('#userTable').DataTable();

            $(document).on('click', '#userTable tbody tr td button', function() {
                var id = $(this).attr('data-value');
                console.log(id);
                $.get( "/admin/user/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#username').val(d.name);
                    $('#id').val(d.id);
                });
            });
        } );
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Data User
                <button type="button" class="float-right btn btn-sm btn-success" data-toggle="modal" data-target="#tambah">Tambah User</button>
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
                      <table class="table table-striped" id="userTable">
                          <thead class="thead-light">
                              <tr>
                                  <th>Nama</th>
                                  <th>Role</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($user as $item) 
                                <tr>
                                    <td>
                                        {{ $item->username }}
                                    </td>
                                    <td>
                                        {{ $item->role_name }}
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.user.destroy', $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#ubah" data-value="{{ $item->id }}">Ubah</span>
                                            <a href="{{ route('admin.resetPassword', $item->id) }}"><button type="button" class="btn btn-sm btn-success mr-1"><span class="text-decoration-none"></span>Reset Password</span></button></a>
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

        <!-- Modal -->
        <div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.user.update', Auth::user()->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                        </div>

                        <div class="form-group">
                            <label>Status: </label>
                            <div class="controls">
                              <select class="form-control" name="role" id="role" required>
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
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
