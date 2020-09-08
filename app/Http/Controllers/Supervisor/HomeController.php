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
        // return $request;
        foreach ($request['items'] as $key => $value) {
            SoldLog::consignmentToSoldLog($key, $value);

            Product::where('id', $key)->decrement('stock', ($value['terjual']));
            Consignment::where('id', $value['id'])->decrement('qty', ((int)$value['terjual'] + (int)$value['retur']));

            return back()->with('success', 'Data berhasil diperbaharui');
        }
    }
}
