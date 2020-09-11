<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if ($id == 1)
        <title>Laporan Produk Retur & Rusak {{ Carbon\Carbon::parse($start)->formatLocalized('%d %B %Y') }} s/d {{ Carbon\Carbon::parse($end)->formatLocalized('%d %B %Y') }}</title>
    @elseif ($id == 2)
        <title>Laporan Penjualan Member {{ Carbon\Carbon::parse($start)->formatLocalized('%d %B %Y') }} s/d {{ Carbon\Carbon::parse($end)->formatLocalized('%d %B %Y') }}</title>
    @elseif ($id == 3)
        <title>Laporan Penjualan Produk {{ Carbon\Carbon::parse($start)->formatLocalized('%d %B %Y') }} s/d {{ Carbon\Carbon::parse($end)->formatLocalized('%d %B %Y') }}</title>
    @endif
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">
</head>
<body>
    <table id="example" class="display" style="width:100%">
    @if ($id == 1)
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Produk</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productionDetail as $item)
                    <tr>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h2 style="margin-top: 2%">Total Produk</h2>
        <table id="total" class="display">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Status</th>
                    <th>Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productionDetail1 as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->qty }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    @elseif ($id == 2)
        {{-- <table id="example" class="display" style="width:100%"> --}}
            <thead>
                <tr>
                    <th>Member</th>
                    <th>Jenis Produk</th>
                    <th>No. Pengiriman</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productionDetail as $item)
                    <tr>
                        <td>{{ $item->member }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->shipping_number }}</td>
                        <td style="text-center">{{ $item->qty }}</td>
                        <td style="text-right">{{  number_format($item->price, 0, ',', '.') }}</td>
                        <td style="text-right">{{  number_format($item->total, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    @elseif ($id == 3)
        {{-- <table id="example" class="display" style="width:100%"> --}}
            <thead>
                <tr>
                    <th>Jenis Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productionDetail as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td style="text-center">{{ $item->qty }}</td>
                        <td style="text-right">{{  number_format($item->price, 0, ',', '.') }}</td>
                        <td style="text-right">{{  number_format($item->total, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
        
    @elseif ($id == 4)
        {{-- <table id="example" class="display" style="width:100%"> --}}
            <thead>
                <tr>
                    <th>Member</th>
                    <th>Jenis Produk</th>
                    <th>ID Transaksi</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productionDetail as $item)
                    <tr>
                        <td>{{ $item->member }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->shipping_number }}</td>
                        <td style="text-center">{{ $item->qty }}</td>
                        <td style="text-right">{{  number_format($item->price, 0, ',', '.') }}</td>
                        <td style="text-right">{{  number_format($item->total, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                {{-- <tr>
                    <td>Gus Mang</td>
                    <td>Rantang Mama Chicken Wings RM</td>
                    <td>1</td>
                    <td>10</td>
                    <td>Rp. 20.000</td>
                    <td>Rp. 200.000</td>
                </tr> --}}
            </tbody>
            
        </table>
        
    @elseif ($id == 5)
        {{-- <table id="example" class="display" style="width:100%"> --}}
            <thead>
                <tr>
                    <th>Jenis Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productionDetail as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td style="text-center">{{ $item->qty }}</td>
                        <td style="text-right">{{  number_format($item->price, 0, ',', '.') }}</td>
                        <td style="text-right">{{  number_format($item->total, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>

    @elseif ($id == 6)
        {{-- <table id="example" class="display" style="width:100%"> --}}
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th style="width:10%">Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productionDetail as $item)
                    <tr>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->category }}
                        </td>
                        <td>
                            {{ $item->stock }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>

    @elseif ($id == 7)
        {{-- <table id="example" class="display" style="width:100%"> --}}
            <thead>
                <tr>
                    <th>Nama</th>
                    <th style="width:10%">Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productionDetail as $item)
                    <tr>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->jumlah }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>

    @elseif ($id == 8)
        {{-- <table id="example" class="display" style="width:100%"> --}}
            <thead>
                {{-- <tr>
                    <th>Nama</th>
                    <th style="width:10%">Stok</th>
                </tr> --}}
            </thead>
            <tbody>
                {{-- @foreach ($productionDetail as $item)
                    <tr>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->jumlah }}
                        </td>
                    </tr>
                @endforeach --}}
            </tbody>
            
        </table>
    @endif

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5'
                ]
            } );
            $('#total').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5'
                ],
                searching: false, 
                paging: false, 
                info: false,
                "width": "20%"
            } );
            $("#total_wrapper").css("width","30%");
            $("#total").css("margin","0");
        } );
    </script>
</body>
</html>