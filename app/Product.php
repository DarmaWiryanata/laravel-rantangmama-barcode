<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'stock'];

    static function destroyProduct($id)
    {
        Product::findOrFail($id)->destroy();
    }

    static function firstProductCode($code)
    {
        $data = Product::where('code', $code)->first(['code']);

        return $data;
    }

    static function incrementStock($request)
    {
        $old_stock = Product::findOrFail($request->product_id);
        Product::whereId($request->product_id)->update(['stock' => $old_stock->stock + $request->stock]);
    }

    static function storeProduct($request)
    {
        Product::create(['name' => $request->name]);
    }

    static function updateProduct($request, $id)
    {
        Product::findOrFail($id)->update(['name' => $request->name]);
    }
}
