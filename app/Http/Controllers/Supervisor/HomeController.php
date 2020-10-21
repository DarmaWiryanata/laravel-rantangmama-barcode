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
        $this->middleware('role:supervisor|superadmin');
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
        return $request;
        foreach ($request['items'] as $key => $value) {
            // return $value['qty'];
            $terjual = ($value['terjual'] == NULL) ? 0 : $value['terjual'] ;
            $retur = ($value['retur'] == NULL) ? 0 : $value['retur'] ;
            $total = $terjual + $retur;
            if ($value['qty'] < $total) {
                return back()->with('error', 'Data terjual dan retur melebihi stok');
            }
        }
        foreach ($request['items'] as $key => $value) {
            $terjual = ($value['terjual'] == NULL) ? 0 : $value['terjual'] ;
            $retur = ($value['retur'] == NULL) ? 0 : $value['retur'] ;
            $total = $terjual + $retur;

            SoldLog::consignmentToSoldLog($value->product_id, $value);

            Product::where('id', $value->product_id)->decrement('stock', $terjual);
            Consignment::where('id', $value['id'])->decrement('qty', $total);
        }

        return back()->with('success', 'Data berhasil diperbaharui');
    }
}
