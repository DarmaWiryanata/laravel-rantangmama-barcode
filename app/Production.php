<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Production extends Model
{
    protected $table = 'productions';
    protected $fillable = ['product_id', 'price', 'expire_date', 'batch', 'qty'];

    static function destroyProduksi($id)
    {
        Production::findOrFail($id)->delete();
    }

    static function getProduction()
    {
        return Production::select('productions.id', 'products.name', 'productions.price', 'productions.qty', 'productions.created_at', 'productions.expire_date')
                            ->join('products', 'productions.product_id', 'products.id')
                            ->get();
    }

    static function storeProduction($request)
    {
        $randNumber = Production::randomNumber(10);
        Production::create([
            'product_id'    => $request->product_id,
            'price'         => $request->price,
            'expire_date'   => Carbon::now()->addDays(90),
            'batch'         => $randNumber,
            'qty'           => $request->stock
        ]);

        return Production::latest()->first();
    }

    static function randomNumber($length) {
        $min = 1 . str_repeat(0, $length-1);
        $max = str_repeat(9, $length);
        return mt_rand((int)$min, (int)$max);   
    }
}
