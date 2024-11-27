<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products(){
    	return $this->belongsToMany('App\Product', 'category_products');
    }
    public function activeProducts(){
    	return $this->belongsToMany('App\Product', 'category_products')->where('status',1);
    }
    public function childrens(){
        return $this->belongsToMany(Category::class,'category_parents','parent_id','category_id');
    }
    public function activeChildrens(){
        return $this->belongsToMany(Category::class,'category_parents','parent_id','category_id')->where('status',1)->orderBy('order_no','asc');
    }
    public function parents(){
        return $this->belongsToMany(Category::class,'category_parents','category_id','parent_id');
    }
    public function activeParents(){
        return $this->belongsToMany(Category::class,'category_parents','category_id','parent_id')->where('status',1)->orderBy('order_no','asc');
    }
}
