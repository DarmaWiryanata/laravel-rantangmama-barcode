@extends('layouts.app')

@section('js')
    <script>
        $(document).ready( function () {
            $('#shippingDetailTable').DataTable({
              "order": [[ 3, "desc" ]]
            });
            $('#tujuan').on('change', function() {
              var id = this.value;
              $.get( "/shipping/data/" + id, function( data ) {
                console.log(JSON.parse(data));
                var d = JSON.parse(data);
                $('#alamat').val(d.address);
              });
              console.log(id);
            });
        } );
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">{{ __('custom.product') }}
                </div>

                <form action="{{ route('shipping.update') }}" method="POST">
                  @csrf
                    <div class="card-body">
                      @if ($message = Session::get('success'))
                          <div class="alert alert-success alert-block">
                              <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
                              Produk {{ session('barcode') }} berhasil diperbaharui
                          </div>
                      @endif

                      @if ($message = Session::get('danger'))
                          <div class="alert alert-danger alert-block">
                              <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
                              {{ $message }}
                          </div>
                      @endif

                        <div class="form-group">
                          <label>Tujuan Pengiriman: </label>
                          <div class="controls">
                            <select class="form-control" name="tujuan" id="tujuan" required>
                              <option value hidden>--Pilih Tujuan</option>
                              @foreach ($member as $item)
                                <option value="{{ $item->id }}"
                                @if (session('tujuan') == $item->id)
                                selected
                                @endif
                                >{{ $item->name }}</option>  
                              @endforeach
                            </select>
                          </div>
                        </div>
              
                        <div class="form-group">
                          <label>Alamat: </label>
                          <div class="controls">
                            <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder="Alamat Member" disabled></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Status: </label>
                          <div class="controls">
                            <select class="form-control" name="status" id="status" required>
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

            <div class="card">
              <div class="card-header">Riwayat Validasi Pengiriman</div>

              <div class="card-body">
                  <table class="table table-striped" id="shippingDetailTable">
                      <thead class="thead-light">
                          <tr>
                              <th>Kode</th>
                              <th>Jenis</th>
                              <th>Tujuan</th>
                              <th>Tanggal</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($productionDetail as $item)
                              @if (isset($item->scan_date))
                                  <tr>
                                      <td>
                                          {{ $item->code }}
                                      </td>
                                      <td>
                                          {{ $item->name }}
                                      </td>
                                      <td>
                                          {{ $item->member }}
                                      </td>
                                      <td>
                                          {{ Carbon\Carbon::parse($item->scan_date)->formatLocalized('%d %B %Y') }}
                                      </td>
                                  </tr>
                              @endif
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection