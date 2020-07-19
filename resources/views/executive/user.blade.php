@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Data Member</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive-xl">
                      <table class="table table-striped">
                          <thead class="thead-light">
                              <tr>
                                  <th>Kode</th>
                                  <th>Nama</th>
                                  <th>Alamat</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>
                                      RCH12313123
                                  </td>
                                  <td>
                                      Agen A
                                  </td>
                                  <td>
                                      Padang Tegal, Jl. Hanoman, Ubud, Kecamatan Ubud, Kabupaten Gianyar, Bali 80571
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      DCK129371293
                                  </td>
                                  <td>
                                      Agen B
                                  </td>
                                  <td>
                                      Jalan Raya Abang Desa Adat, Ababi, Abang, Kabupaten Karangasem, Bali 80852
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      DKA1231932
                                  </td>
                                  <td>
                                      Agen C
                                  </td>
                                  <td>
                                      Jl. Raya Kintamani, Batur Sel., Kec. Kintamani, Kabupaten Bangli, Bali 80652
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
