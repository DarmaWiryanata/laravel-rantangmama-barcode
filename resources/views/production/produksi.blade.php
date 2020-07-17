@extends('layouts.app')

@section('navbar')
    <x-navbar name='Penyimpanan' :route="route('production.produksi.index')" status='active' />
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Penyimpanan</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times text-white"></i></button>
                            {{ $message }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('production.produksi.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="barcode">Kode</label>
                            <input type="number" class="form-control" name="barcode" id="barcode" autofocus>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection