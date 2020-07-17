@extends('layouts.app')

@section('navbar')
    <x-navbar-expand name='Data Master' status=''>
        <a class="dropdown-item" href="">Produk</a>
        <a class="dropdown-item" href="#">Produksi</a>
        <a class="dropdown-item" href="#">User</a>
    </x-navbar-expand>
    <x-navbar name='User' :route="route('production.home')" status='' />
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in') }} as {{ $role->description }}!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
