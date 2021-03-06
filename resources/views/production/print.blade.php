<!doctype html>
<html>
<head>
    <style>
    .grid-container {
      display: grid;
      grid-template-columns: auto auto auto auto;
      grid-gap: 5px;
      padding: 2px;
    }
    
    .grid-container > div {
      text-align: center;
      padding: 0 10px;
      font-size: 15px;
      border: 1px solid black;
    }
    </style>
</head>
<body>
    <div class="grid-container">
        @foreach ($productionDetail as $item)
            <div>
                Expired : {{ \Carbon\Carbon::parse($item->expire_date)->format('j-m-Y') }}
                <br>
                {{-- {{ '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($item->code, 'C128',1,50,array(1,1,1), true) . '" alt="barcode"   />' }} --}}
                {{-- {{ DNS1D::getBarcodePNG($item->code, 'C128',1,50,array(1,1,1), true) }} --}}
                <img class="img-fluid" src="data:image/png;base64,{{ DNS1D::getBarcodePNG($item->code, 'C128',2,50,array(1,1,1), true) }}" alt="barcode" />
                <br>
                Batch No. {{ $item->batch }}
            </div>
        @endforeach
    </div>
</body>