@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('custom.product') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('production.produksi.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="reseller">Jenis Produk</label>
                            <select class="form-control" name="reseller" id="reseller" autofocus>
                                <option>CHICKEN WING MT 8 pcs</option>
                                <option>CHICKEN WING MT12 pcs</option>
                                <option>CHICKEN WING RM 10 pcs</option>
                                <option>CHICKEN PANDAN MT 8 pcs</option>
                                <option>CHICKEN PANDAN RM 6 pcs</option>
                                <option>BAKSO AYAM MADU RM 15 pcs</option>
                                <option>BAKSO AYAM SUPER MT 15 pcs</option>
                                <option>BAKSO AYAM SUPER MT 32 Pcs</option>
                                <option>BAKSO AYAM SUPER RM 20 pcs</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="expire_date">Tanggal Kadaluwarsa</label>
                            <input type="date" class="form-control" name="expire_date" id="expire_date">
                        </div>
                        <div class="form-group">
                            <label for="stock">Jumlah</label>
                            <input type="number" class="form-control" name="stock" id="stock">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
