<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   
     public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

     public function shippingAddress(){
        return $this->hasOne(ShippingAddress::class);
    }

    public function orderStatus()
    {
        switch($this->order_status){
            case '0':
                return '<span class="status-label status-label-warning">Pending</span>';
                break ;
             case '1':
                return '<span class="status-label status-label-success">Confirm</span>';
                break ;
             case '2':
                return '<span class="status-label status-label-danger">Cancel</span>';
                break ;     
            case '3':
                    return '<span class="status-label status-label-info">Return</span>';
                    break ; 
            case '4':
                    return '<span class="status-label status-label-info">Delivered</span>';
                    break ;     
            default:     
             return '<span class="status-label status-label-warning">Pending</span>';
        }
    }
}
