<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Consignment;
use App\Product;
use App\SoldLog;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:supervisor');
    }

    public function index()
    {
        $consignment = Consignment::getConsignment();
        
        return view('supervisor.produk', compact('consignment'));
    }

    public function show($id)
    {
        $data = Consignment::showConsignment($id);

        return json_encode($data);
    }

    public function update(Request $request, $id)
    {
        foreach ($request['items'] as $key => $value) {
            $value['shipping_number'];
            Consignment::decrement('qty', $value['terjual'] + $value['retur'], ['id' => $key]);
            $data = Consignment::whereId($key)->first();
            $product = Product::whereId($data->product_id)->first();

            SoldLog::consignmentToSoldLog($request);

            Product::where('id', $data->product_id)
                    ->update([
                        'stock' => $product->stock - ($value['terjual'] + $value['retur'])
                    ]);

            return back()->with('success', 'Data berhasil diperbaharui');
        }
    }
}
