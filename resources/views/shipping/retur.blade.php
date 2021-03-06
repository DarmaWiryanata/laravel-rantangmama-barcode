@extends('layouts.app')

@section('js')
    <script>
        $(document).ready( function () {
            $('#productionDetailTable').DataTable({
              "order": [[ 2, "desc" ]]
            });
            
            $('form').submit(function() {
                $(this).find("button[type='submit']").prop('disabled', true);
            });
        } );
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">Retur Produk</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
                            {{ $message }}
                        </div>
                    @endif

                    @if ($message = Session::get('danger'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
                            {{ $message }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('shipping.returUpdate') }}">
                        @csrf
                        <div class="form-group">
                            <label for="barcode">Kode</label>
                            <input type="text" class="form-control" name="barcode" id="barcode" autofocus>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Riwayat Retur Produksi</div>

                <div class="card-body">
                    <table class="table table-striped" id="productionDetailTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Kode</th>
                                <th>Jenis</th>
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