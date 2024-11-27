<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotSales extends Model
{
    protected $table = 'hot_sales';
    
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
