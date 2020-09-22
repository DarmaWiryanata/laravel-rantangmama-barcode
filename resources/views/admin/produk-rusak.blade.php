@extends('layouts.app')

@section('js')
    <script>
        $(document).ready( function () {
            $('#productionDetailTable').DataTable();
        } );
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">Validasi Produk Retur/Rusak</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($message = Session::get('danger'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
                            {{ $message }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.produk-rusak.update') }}">
                        @csrf
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="3"
                                @if (session('status') == '3')
                                selected
                                @endif
                                >Retur</option>
                                
                                <option value="4"
                                @if (session('status') == '4')
                                selected
                                @endif
                                >Rusak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nb">Keterangan</label>
                            <textarea name="nb" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="barcode">Kode</label>
                            <input type="text" class="form-control" name="barcode" id="barcode" required autofocus>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Riwayat Validasi Produksi Rusak</div>

                <div class="card-body">
                    <table class="table table-striped" id="productionDetailTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Kode</th>
                                <th>Jenis</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productionDetail as $item)
                                <tr>
                                    <td>
                                        {{ $item->code }}
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{ $item->status }}
                                    </td>
                                    <td>
                                        {{ Carbon\Carbon::parse($item->scan_date)->formatLocalized('%d %B %Y') }}
                                    </td>
                                    <td>
                                        {{ $item->nb }}
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
@endsection