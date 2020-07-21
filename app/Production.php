<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $table = 'productions';
    protected $fillable = ['product_id', 'expire_date', 'qty'];

    static function getProduction()
    {
        return Production::select('productions.id', 'products.name', 'productions.qty', 'productions.created_at', 'productions.expire_date')
                            ->join('products', 'productions.product_id', 'products.id')
                            ->get();
    }

    static function storeProduction($request)
    {
        Production::create([
            'product_id'    => $request->product_id,
            'expire_date'   => $request->expire_date,
            'qty'           => $request->stock
        ]);

        return Production::latest()->first();
    }
}
