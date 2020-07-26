<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Consignment;

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
        // foreach ($request['items'] as $key => $value) {
        //     return $consignment = Consignment::firstConsignment(1);

        //     if ($value['terjual'] + $value['retur'] > $consignment->qty) {
        //         return back()->with('error', 'Jumlah produk terjual dan retur (' . $value['terjual'] + $value['retur'] . ') pada produk ' . $consignment->name . 'tidak boleh lebih dari qty (' . $consignment->qty . ')');
        //     }
        // }

        foreach ($request['items'] as $key => $value) {
            Consignment::decrement('qty', $value['terjual'] + $value['retur'], ['id' => $key]);

            return back()->with('success', 'Data berhasil diperbaharui');
        }
    }
}
