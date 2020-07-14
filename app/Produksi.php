<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $table = 'produksi';

    protected $fillable = ['produk_id', 'production_date', 'expire_date', 'qty'];
}
