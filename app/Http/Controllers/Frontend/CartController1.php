<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Product;
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\ShippingAddress;
use App\Category;
use App\ProductStock;
use App\Brand;
use Session;

class CartController extends Controller
{




    public function index(){
        //  \Cart::clear();
    
        return view('frontend.shopping.cart',get_defined_vars());
       
    }

    public function cartProductAvailable($id,$size=null){
        $product = Product::with('productImage')->find($id);
    }

    public function addToCart($id){
        $product =  Product::with('productImage')->with('productStocks')->find($id);
         $sizeId = $product->productStocks[0]->size_id;
          $stockQuantity = $product->productStocks[0]->purchase_qty;
         $sizeName = '';
         if($sizeId != 1){
            $sizeName = $product->productStocks[0]->size->name;
         }
         
          $currentCartItem = null;
       
            foreach(Cart::getContent() as $content){
                if($content->attributes->product_id == $product->id && $content->attributes->size_id == $sizeId){
                   $currentCartItem = $content;
                }
            }
     
        
        //  return $stockQuantity;
        //  return  $currentCartItem ;
        if($currentCartItem){
            if((int) $stockQuantity == (int) $currentCartItem->quantity){
                return false;
            }
        }
        
        $productPrice = 0;
        if ($product->reduce_price > 0):
            $productPrice  = $product->reduce_price ;
        else:	
            $productPrice  = $product->sales_price ; 
        endif;

        $unqId = (int)  ((int) $product->id + (int) $sizeId);

        Cart::add([
            'id' =>  $unqId ,  
            'name' => $product->name,
            'price' => (int) $productPrice,
            'quantity' => 1,
            'attributes' => [
                'image'=>$product->thumbnail,
                'size'=> $sizeName,
                'size_id'=> (int)  $sizeId,
                'product_id'=> (int) $product->id, 
            ],
        ]);

        // Session::flash('success','Add to cart');

       $totalQuantity =  Cart::getTotalQuantity();
        $getTotal =  Cart::getTotal();
        return [
            'totalQuantity' => $totalQuantity,
            'getTotal' => $getTotal,
        ];
    //    return back();
    }

    public function addToCartByQuantity(Request $request,$id,$sizeQuantity){
        //  return $request->all();
         $sizeQuantity =  explode("-",$sizeQuantity);

          $sizeId =  $sizeQuantity[0];
         $quantity =  $sizeQuantity[1];

        $product = Product::with('productImage')->with('productStocks')->find($id);
        // Cart::clear();
        // return $product;
        $productPrice = 0;
        // return 'ok';
        if ($product->reduce_price > 0):
            $productPrice  = $product->reduce_price ;
        else:	
            $productPrice  = $product->sales_price ; 
        endif;

         $sizeName = '';
         if($sizeId != 1){
            $sizeName = $product->productStocks[0]->size->name;
         }

        //  return 'ok';
         $stockQuantity = ProductStock::where('product_id',$product->id)->where('size_id',$sizeId)->first();
    //    return  $stockQuantity;

    
    $sizeName = $stockQuantity->size->name; 
    
    
        $currentCartItem = null;
       
        foreach(Cart::getContent() as $content){
            if($content->attributes->product_id == $product->id && $content->attributes->size_id == $sizeId){
               $currentCartItem = $content;
            }
        }
 
    
    //  return $stockQuantity;
    //  return  $currentCartItem ;
   
        //  return $stockQuantity->purchase_qty;
        //  return  $currentCartItem->quantity  ;
        // return $currentCartItem;
        if($currentCartItem){
            // return 1;
          if((int) $stockQuantity->purchase_qty == (int) $currentCartItem->quantity){
              return false;
          }else if( ((int)  $currentCartItem->quantity + (int)  $quantity  ) >= $stockQuantity->purchase_qty +1 ){
            return false;
            return  ((int)  $currentCartItem->quantity + (int)  $quantity);
         }

        }else{
            if($stockQuantity->purchase_qty == $quantity +1 ){
                return false;
            }
        }
      
        //  return $currentCartItem;
        // return (int)  ($product->id + $sizeId);
        $unqId = (int)  ( (int) $product->id + (int) $sizeId);
    //   return $unqId;
    //   return $quantity;
        Cart::add([
            'id' => $unqId,  
            'name' => $product->name,
            'price' => (int) $productPrice,
            'quantity' => (int) $quantity,
            'attributes' => [
                // 'relative' => false,
                'image'=>$product->thumbnail,
                'size'=> $sizeName,
                'size_id'=> (int)  $sizeId,
                'product_id'=> (int) $product->id, 
            ],
        ]);

        // Session::flash('success','Add to cart');

       $totalQuantity =  Cart::getTotalQuantity();
        $getTotal =  Cart::getTotal();
        return [
            'totalQuantity' => $totalQuantity,
            'getTotal' => $getTotal,
        ];
    //    return back();
    }



    public function removeCartItem($id){
        Cart::remove($id);
        $totalQuantity =  Cart::getTotalQuantity();
        $getTotal =  Cart::getTotal();
        return [
            'totalQuantity' => $totalQuantity,
            'getTotal' => $getTotal,
        ];
    }
    

    public function addToCartForm(Request $request,$id){
    //    return Cart::search(function($cartItem, $ridowId) {
    //         return $cartItem->id == $id;
    //     });
        // return $id;
        // return $request->all();
        $product = Product::find($id);
        // Cart::clear();
        // return Cart::getContent();
        // return Cart::getContent();
        $currentCartItem = null;
        foreach(Cart::getContent() as $content){
            // return $content->id;
            if($content->id == $id){
               $currentCartItem = $content;
            }
        }
     
        $productPrice = 0;
        if ($product->reduce_price > 0):
            $productPrice  = $product->reduce_price ;
        else:	
            $productPrice  = $product->sales_price ; 
        endif;
        $quantity = (int) $request->quantity;
        Cart::remove($id);
        Cart::add([
            'id' =>  $product->id, 
            'name' => $product->name,
            'price' => $productPrice,
            'quantity' => $quantity,
            'attributes' => [
                'image'=>$product->thumbnail,
            ],
        ]);
       return back();
    }

        public function updateCartItem(Request $request,$id){
        // return  $id;
        // return $request->all();
        // Cart::remove($id);
        $product = Product::with('productImage')->find($id);
        $productPrice = 0;
        if ($product->reduce_price > 0):
            $productPrice  = $product->reduce_price ;
        else:	
            $productPrice  = $product->sales_price ; 
        endif;
        // Cart::remove($id);
        Cart::update($product->id,[
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ]);
       
          return back();
    }

    public function updateAllCartItem(Request $request){
        // return  $id;
        // return $request->all();

        // $products = Product::whereIn('id',$request->ids)->with('productImage')->get();

        Cart::clear();
        for($i = 0;  $i < count($request->name) ; $i++){
            Cart::add([
                'id' => $request->ids[$i], 
                'name' => $request->name[$i],
                'price' =>$request->price[$i],
                'quantity' => $request->quantity[$i] == 0 ? 1 : $request->quantity[$i],
                'attributes' => [
                    'image'=>$request->image[$i],
                ],
            ]);
        }
       
          return back();
    }


    public function checkout(){
        $pageTitle = 'Customer Checkout';
        if(Cart::getTotal() == 0){
            return back();
        }
        // return auth()->user()->customer;
        return view('frontend.shopping.checkout',\get_defined_vars());
    }

     public function placeOrder(Request $request){

       
        // return $request->shipping_address;
        // return $request->all();
        // if (!$request->filled('shipping_address_check')) {
        //     return 1;
        // }
        // return 0;

        
      
        if (!$request->filled('shipping_address_check')) {
            $this->validate($request,[
                'shipping_first_name' => 'required|max:120|string',
                'shipping_last_name' => 'required|max:120|string',
                'shipping_email' => 'nullable|email|max:120',
                'shipping_mobile' => 'required_without:shipping_phone|max:120',
                'shipping_phone' => 'required_without:shipping_mobile|max:120',
                'shipping_address' => 'required|max:120',
                'shipping_country' => 'required|max:120',
                'shipping_state' => 'required|max:120',
                'shipping_city' => 'required|max:120',
                'shipping_post_code' => 'required|max:120',
            ]);
         }

         $this->validate($request,[
            'payment_method' => 'required',
           
        ]);

    //      session()->put('shipping_address', $request->except(['_token']));
    //    return  session()->get('shipping_address');


        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->order_status = 0;
        $order->payment_type = $request->payment_method;
        $order->shipping_address = $request->filled('shipping_address_check') ? 1 : 0;
        $order->payment_status = 0;
        $order->total = Cart::getTotal();
        $order->save();

        foreach (Cart::getContent() as  $cartItem){
              $orderDetail = new OrderDetail();
              
             $orderDetail->order_id  = $order->id;
             $orderDetail->product_id  =  $cartItem['id'];
             $orderDetail->price  = $cartItem['price'];
             $orderDetail->quantity  = $cartItem['quantity'];
             $orderDetail->save();
        }

            $customer =  Customer::where('user_id',auth()->user()->id)->first();
            $customer->mobile  = $request->mobile;
            $customer->phone  = $request->phone;
            $customer->address_one  = $request->address_one;
            $customer->address_two  = $request->address_two;
            $customer->country  = $request->country;
            $customer->state  = $request->state;
            $customer->city  = $request->city;
            $customer->post_code  = $request->post_code;
            $customer->save();




        if (!$request->filled('shipping_address_check')) {
            $shippingAddress = new ShippingAddress();

            $shippingAddress->user_id  = auth()->user()->id;
            $shippingAddress->order_id  = $order->id;
    
            $shippingAddress->first_name  = $request->shipping_first_name;
            $shippingAddress->last_name  = $request->shipping_last_name;
            $shippingAddress->email  = $request->shipping_email;
            $shippingAddress->mobile  = $request->shipping_mobile;
            $shippingAddress->phone  = $request->shipping_phone;
            $shippingAddress->address  = $request->shipping_address;
            $shippingAddress->country  = $request->shipping_country;
            $shippingAddress->state  = $request->shipping_state;
            $shippingAddress->city  = $request->shipping_city;
            $shippingAddress->post_code  = $request->shipping_post_code;

            $shippingAddress->save();
        }

        if(session()->has('shipping_address')){
            session()->forget('shipping_address');
        }
       
        Cart::clear();
        return \redirect()->to('/');
        // return view('frontend.shopping.checkout');
    }


    public function incrementCartQuantity($id){

        $currentCartItem = null;
        if(!Cart::isEmpty()){
            foreach(Cart::getContent() as $content){
                // return $content->id;
                if($content->id == $id){
                   $currentCartItem = $content;
                }
            }
        }
        

        if($currentCartItem == null){
            $product = Product::find($id);
         
            $productPrice = 0;
            if ($product->reduce_price > 0):
                $productPrice  = $product->reduce_price ;
            else:	
                $productPrice  = $product->sales_price ; 
            endif;
            Cart::add([
                'id' =>  $product->id, 
                'name' => $product->name,
                'price' => $productPrice,
                'quantity' => 1,
                'attributes' => [
                    'image'=>$product->thumbnail,
                ],
            ]);
        }else{
            $quantity = (int) $currentCartItem['quantity'] + 1;
            Cart::update($id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $quantity,
                ),
              ));
        }

          $totalQuantity =  Cart::getTotalQuantity();
          $getTotal =  Cart::getTotal();
          return [
              'totalQuantity' => $totalQuantity,
              'getTotal' => $getTotal,
          ];
    }

    public function decrementCartQuantity($id){

        $currentCartItem = null;
        foreach(Cart::getContent() as $content){
            // return $content->id;
            if($content->id == $id){
               $currentCartItem = $content;
            }
        }
       
        $quantity = (int) $currentCartItem['quantity'] - 1;
        Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $quantity,
            ),
          ));
     
       
          $totalQuantity =  Cart::getTotalQuantity();
          $getTotal =  Cart::getTotal();
          return [
              'totalQuantity' => $totalQuantity,
              'getTotal' => $getTotal,
          ];
    }


    
    


    

}
