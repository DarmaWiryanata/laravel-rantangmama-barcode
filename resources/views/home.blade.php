@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="card-deck-wrapper">
                        <div class="card-deck">
                            <div class="row">
                                <div class="col-6 mb-1">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Laporan A</h4>
                                                <p class="card-text">This card has supporting text below as a natural lead-in to
                                                    additional content.</p>
                                                <div class="row justify-content-center">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tanggal" data-value="#"> Cetak Laporan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-1">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Laporan B</h4>
                                                <p class="card-text">This card has supporting text below as a natural lead-in to
                                                    additional content.</p>
                                                <div class="row justify-content-center">
                                                    <button type="button" class="btn btn-primary"> Cetak Laporan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-1">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Laporan C</h4>
                                                <p class="card-text">This card has supporting text below as a natural lead-in to
                                                    additional content.</p>
                                                <div class="row justify-content-center">
                                                    <button type="button" class="btn btn-primary"> Cetak Laporan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-1">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Laporan D</h4>
                                                <p class="card-text">This card has supporting text below as a natural lead-in to
                                                    additional content.</p>
                                                <div class="row justify-content-center">
                                                    <button type="button" class="btn btn-primary"> Cetak Laporan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
