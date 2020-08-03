<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'stock'];

    static function destroyProduct($id)
    {
        Product::findOrFail($id)->delete();
    }

    static function getProduct()
    {
        return Product::selectRaw('*, IF(RIGHT(name, 2) = "RM", "Rantang Mama", "Mitra Usaha") as category')->get();
    }
    
    static function firstProductCode($code)
    {
        $data = Product::where('code', $code)->first(['code']);

        return $data;
    }

    static function firstProduct($id)
    {
        return Product::whereId($id)->first();
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

    static function updateProduct($request)
    {
        Product::findOrFail($request->id)->update(['name' => $request->name]);
    }
}
