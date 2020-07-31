<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
            'expire_date'   => Carbon::now()->addDays(90),
            'qty'           => $request->stock
        ]);

        return Production::latest()->first();
    }
}
