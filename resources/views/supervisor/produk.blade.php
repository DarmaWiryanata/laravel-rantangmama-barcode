@extends('layouts.app')

@section('js')
    <script>
        $(document).ready( function () {
            $('#konsinyasiTable').DataTable();
            
            $('form').submit(function() {
                $(this).find("button[type='submit']").prop('disabled', true);
            });

            $(document).on( "click", "#konsinyasiTable tbody tr td button", function() {
                var id = $(this).attr('data-value');
                $.get( "/supervisor/produk/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#name').val(d[0].name);
                    $('#data tr').remove();
                    for (var i = 0; i < d[0]['items'].length; i++) {
                        $('#data').append(
                                        `<tr>
                                            <td>
                                                `+ d[0]['items'][i].name +`
                                            </td>
                                            <td>
                                                `+ d[0]['items'][i].shipping_number +`
                                                <input type="hidden" class="form-control" name="items[`+ i +`][id]" value="`+ d[0]['items'][i].id +`">
                                                <input type="hidden" class="form-control" name="items[`+ i +`][member_id]" value="`+ d[0].member_id +`">
                                                <input type="hidden" class="form-control" name="items[`+ i +`][shipping_number]" value="`+ d[0]['items'][i].shipping_number +`">
                                                <input type="hidden" class="form-control" name="items[`+ i +`][product_id]" value="`+ d[0]['items'][i].product_id +`">
                                                <input type="hidden" class="form-control" name="items[`+ i +`][qty]" value="`+ d[0]['items'][i].qty +`">
                                            </td>
                                            <td>
                                                `+ d[0]['items'][i].qty +`
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="items[`+ i +`][terjual]" placeholder="0">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="items[`+ i +`][retur]" placeholder="0">
                                            </td>
                                        </tr>`);
                    }
                });
                console.log($(this).attr('data-value'));
            });
        });
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Produk Konsinyasi</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
                            {{ $message }}
                        </div>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
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

                    <table class="table table-striped" id="konsinyasiTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Member</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($consignment as $item)
                                <tr>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail" data-value="{{ $item->member_id }}">Lihat Detail</button>
                                    </td>
                                </tr>
                            @endforeach
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('supervisor.update', Auth::user()->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input disabled type="name" class="form-control" name="nama" id="name" value="Agen A" placeholder="<Kosong>">
                    </div>

                    <hr>
                    <label>Ubah Data Penjualan</label>
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama</th>
                                <th>No. Pengiriman</th>
                                <th>Sisa Stok</th>
                                <th style="width: 43px;">Terjual</th>
                                <th style="width: 67px;">Retur</th>
                            </tr>
                        </thead>
                        <tbody id="data">
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection