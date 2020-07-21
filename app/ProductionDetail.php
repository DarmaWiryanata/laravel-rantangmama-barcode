<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductionDetail extends Model
{
    protected $table = 'production_details';
    protected $fillable = ['production_id', 'member_id', 'code', 'production_scan', 'shipping_scan', 'status'];

    static function storeProductionDetail($request, $id)
    {
        for ($i=0; $i < $request->stock; $i++) { 
            $code = ProductionDetail::generateCode();
            ProductionDetail::create([
                'production_id' => $id,
                'code'          => $code,
            ]);
        }
    }

    static function generateCode()
    {
        return Str::random(10);
    }
}