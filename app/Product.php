<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public function productStock(){
        return $this->hasOne(ProductStock::class);
    }

    public function productStocks()
    {
        return $this->hasMany('App\ProductStock');
    }

   

    public function hotSales()
    {
        return $this->hasOne('App\HotSales');
    }

   
    public function categories(){
    	return $this->belongsToMany('App\Category', 'category_products');
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }


    public function productImage(){
        return $this->hasOne(ProductImage::class);
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class);
    }
   
    public function format(){
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'purchase_price' => $this->purchase_price,
            'sales_price' => $this->sales_price,
            'box_size' => $this->box_size,
        ];
    }
}
