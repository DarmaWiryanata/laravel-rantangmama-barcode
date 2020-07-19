@extends('layouts.app')

@section('navbar')
    <x-navbar-expand name='Data Master' status="active">
        <a class="dropdown-item active" href="#">Produk</a>
        <a class="dropdown-item" href="#">Produksi</a>
        <a class="dropdown-item" href="#">User</a>
    </x-navbar-expand>
    <x-navbar name='User' :route="route('admin.home')" status='' />
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('custom.product') }}
                </div>

                <form action="{{ route('pengiriman.store') }}" method="POST">
                  @csrf
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                Barcode {{ session('barcode') }} berhasil
                            </div>
                        @endif

                        <div class="form-group">
                          <label>Tujuan Pengiriman: </label>
                          <div class="controls">
                            <select class="form-control" name="tujuan" id="tujuan">
                              <option value="1"
                              @if (session('tujuan') == 1)
                              selected
                              @endif
                              >Agen A</option>  
                              <option value="2"
                              @if (session('tujuan') == 2)
                              selected
                              @endif
                              >Agen B</option>
                              <option value="3"
                              @if (session('tujuan') == 3)
                              selected
                              @endif
                              >Agen C</option>
                            </select>
                          </div>
                        </div>
              
                        <div class="form-group">
                          <label>Alamat: </label>
                          <div class="controls">
                            <textarea name="alamat" cols="30" rows="3" class="form-control" disabled>Padang Tegal, Jl. Hanoman, Ubud, Kecamatan Ubud, Kabupaten Gianyar, Bali 80571</textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Status: </label>
                          <div class="controls">
                            <select class="form-control" name="status" id="status">
                              <option value="1"
                              @if (session('status') == 1)
                              selected
                              @endif
                              >Terjual</option>  
                              <option value="2"
                              @if (session('status') == 2)
                              selected
                              @endif
                              >Konsinyasi</option>
                            </select>
                          </div>
                        </div>
              
                        <div class="form-group">
                          <label>Barcode: </label>
                          <div class="controls">
                            <input type="text" name="barcode" class="form-control" placeholder="Barcode" required autofocus>
                          </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>            
            </div>
        </div>
    </div>
</div>
@endsection
