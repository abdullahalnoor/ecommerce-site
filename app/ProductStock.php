<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    public function size()
    {
        return $this->belongsTo('App\Size');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
   
}
