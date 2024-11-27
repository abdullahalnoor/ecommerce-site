<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\PlaceOrderMail;
use Cart;
use App\Product;
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\ShippingAddress;
use App\Category;
use App\ProductStock;
use App\Brand;
use App\Size;
use Session;


class CartController extends Controller
{




    public function index(){
        //  \Cart::clear();
        $cartContents =  Cart::getContent();
         $cartContents = $cartContents->values() ;
        // return $cartContents[0]->attributes->size;
        return view('frontend.shopping.cart',get_defined_vars());
       
    }


    public function checkProductAvailability(Request $request){
       return $product = ProductStock::where('product_id',$request->product_id)
                                    ->where('size_id',$request->size_id)
                                    ->first()['purchase_qty'];
    }
    

    public function addStandarProductToCart($id){
        $product =  Product::with('productImage')->with('productStocks')->find($id);
         $sizeId = $product->productStocks[0]->size_id;
          $stockQuantity = $product->productStocks[0]->purchase_qty;
         $sizeName = '';

        //  return 'ok';
         $currentCartItem = null;
       
         foreach(Cart::getContent() as $content){
             if($content->attributes->product_id == $product->id && $content->attributes->size_id == $sizeId){
                $currentCartItem = $content;
             }
         }
  

            if($currentCartItem){
                if((int) $stockQuantity == (int) $currentCartItem->quantity){
                    return [
                        'stock_limit' => false,
                    ];
                }
            }
   
        
        $productPrice = 0;
        if ($product->reduce_price > 0):
            $productPrice  = $product->reduce_price ;
        else:	
            $productPrice  = $product->sales_price ; 
        endif;

       
        $unuqId = ProductStock::where('product_id', $product->id)->first();
        Cart::add([
            'id' =>  $unuqId->id ,  
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

     

       $totalQuantity =  Cart::getTotalQuantity();
        $getTotal =  Cart::getTotal();
        return [
            'stock_limit' => true,
            'totalQuantity' => $totalQuantity,
            'getTotal' => $getTotal,
        ];
  
    }

    

    public function saveStandarProductToCart(Request $request){
        
        
        // return $request->productid;
        // return $request->orderQuantity;
        $product =  Product::with('productImage')->with('productStocks')->find($request->productid);
         $sizeId = $product->productStocks[0]->size_id;
          $stockQuantity = $product->productStocks[0]->purchase_qty;
         $sizeName = '';

        //  return  $stockQuantity;
        //  $currentCartItem = null;
       
        //  foreach(Cart::getContent() as $content){
        //      if($content->attributes->product_id == $product->id && $content->attributes->size_id == $sizeId){
        //         $currentCartItem = $content;
        //      }
        //  }

         if((int) $request->orderQuantity > (int) $stockQuantity ){
            return [
                'stock_limit' => false,
            ];
        }
  

            // if($currentCartItem){
            //     if((int) $stockQuantity == (int) $currentCartItem->quantity){
            //         return  $stockQuantity;
            //         return [
            //             'stock_limit' => false,
            //         ];
            //     }
            // }
   
        
        $productPrice = 0;
        if ($product->reduce_price > 0):
            $productPrice  = $product->reduce_price ;
        else:	
            $productPrice  = $product->sales_price ; 
        endif;

        $unuqId = ProductStock::where('product_id', $product->id)->first();
        Cart::remove($unuqId->id);
        Cart::add([
            'id' =>  $unuqId->id ,
            'name' => $product->name,
            'price' => (int) $productPrice,
            'quantity' => $request->orderQuantity,
            // 'quantity' => array(
            //     'relative' => false,
            //     'value' =>  $request->orderQuantity,
            // ),
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
            'stock_limit' => true,
            'totalQuantity' => $totalQuantity,
            'getTotal' => $getTotal,
        ];
   
    }


    


    public function saveVariantProductToCart(Request $request){
        
        
        // return $request->product_id;
        // return $request->orderQuantity;
        $product =  Product::find($request->product_id);
         $sizeId = $request->size_id;
           $productStock = ProductStock::where('product_id',$request->product_id)
          ->where('size_id',$request->size_id)
          ->first();
        //   $productStock =  $productStock->purchase_qty ;
          $stockQuantity =  $productStock->purchase_qty ;
         $size = Size::find($request->size_id);
         $sizeName = $size->name;

        //  return  $stockQuantity;
        //  $currentCartItem = null;
       
        //  foreach(Cart::getContent() as $content){
        //      if($content->attributes->product_id == $product->id && $content->attributes->size_id == $sizeId){
        //         $currentCartItem = $content;
        //      }
        //  }

         if((int) $request->quantity > (int) $stockQuantity ){
            return [
                'stock_limit' => false,
            ];
        }
  

            // if($currentCartItem){
            //     if((int) $stockQuantity == (int) $currentCartItem->quantity){
            //         return  $stockQuantity;
            //         return [
            //             'stock_limit' => false,
            //         ];
            //     }
            // }
   
        
        $productPrice = 0;
        if ($product->reduce_price > 0):
            $productPrice  = $product->reduce_price ;
        else:	
            $productPrice  = $product->sales_price ; 
        endif;

        Cart::remove($productStock->id);
        Cart::add([
            'id' =>  $productStock->id ,  
            'name' => $product->name,
            'price' => (int) $productPrice,
            'quantity' => $request->quantity,
            // 'quantity' => array(
            //     'relative' => false,
            //     'value' =>  $request->quantity,
            // ),
            'attributes' => [
                'image'=>$product->thumbnail,
                'size'=> $sizeName,
                'size_id'=> (int)  $sizeId,
                'product_id'=> (int) $product->id, 
            ],
        ]);

      
       $totalQuantity =  Cart::getTotalQuantity();
        $getTotal =  Cart::getTotal();
        return [
            'stock_limit' => true,
            'totalQuantity' => $totalQuantity,
            'getTotal' => $getTotal,
        ];
    //    return back();
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
        // return $id;
        // return $currentCartItem->quantity;
        $productStock = ProductStock::find($id);

        $quantity = (int) $currentCartItem['quantity'] + 1;

        if((int) $quantity  > (int) $productStock->purchase_qty ){
            return [
                'stock_limit' => false,
            ];
        }

        
        
           
            Cart::update($id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $quantity,
                ),
              ));
        

          $totalQuantity =  Cart::getTotalQuantity();
          $getTotal =  Cart::getTotal();
          return [
            'stock_limit' => true,
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
            'stock_limit' => true,
              'totalQuantity' => $totalQuantity,
              'getTotal' => $getTotal,
          ];
    }

 


    public function removeCartItem($id){
        Cart::remove($id);
        $totalQuantity =  Cart::getTotalQuantity();
        $getTotal =  Cart::getTotal();
        return [
            'stock_limit' => true,
            'totalQuantity' => $totalQuantity,
            'getTotal' => $getTotal,
        ];
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
        // return date('dmY').'-'.mt_rand(10,10000);

        $this->validate($request,[
            'mobile' => 'required|min:10|max:15|string',
            'phone' => 'nullable|min:7|max:15',
            'address_one' => 'required|max:150',
            'address_two' => 'nullable|max:150',
            'city' => 'required|max:30',
            'post_code' => 'nullable|max:6',
        ]);

        
      
        if (!$request->filled('shipping_address_check')) {
            $this->validate($request,[
                'shipping_first_name' => 'required|max:120|string',
                'shipping_last_name' => 'nullable|max:120|string',
                'shipping_email' => 'nullable|email|max:120',
                'shipping_mobile' => 'required|min:10|max:15|string',
                'shipping_phone' => 'nullable|min:7|max:15',
                'shipping_address' => 'required|max:120',
                'shipping_city' => 'required|max:120',
                'shipping_post_code' => 'nullable|max:120',
            ]);
         }

        $this->validate($request,[
            'payment_method' => 'required',
           
        ]);

        // return 1;

    //      session()->put('shipping_address', $request->except(['_token']));
    //    return  session()->get('shipping_address');


        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->order_status = 0;
        $order->order_no = date('dmY').'-'.mt_rand(10,10000);
        $order->payment_type = $request->payment_method;
        $order->shipping_address = $request->filled('shipping_address_check') ? 1 : 0;
        $order->payment_status = 0;
        $order->total = Cart::getTotal();
        $order->save();

        foreach (Cart::getContent() as  $cartItem){
              $orderDetail = new OrderDetail();
              
             $orderDetail->order_id  = $order->id;
             $orderDetail->product_id  =  $cartItem['attributes']['product_id'];
             $orderDetail->size_id  =  $cartItem['attributes']['size_id'];
             $orderDetail->price  = $cartItem['price'];
             $orderDetail->quantity  = $cartItem['quantity'];
             $orderDetail->save();
        }

            $customer =  Customer::where('user_id',auth()->user()->id)->first();
            $customer->mobile  = $request->mobile;
            $customer->phone  = $request->phone;
            $customer->address_one  = $request->address_one;
            $customer->address_two  = $request->address_two;
            // $customer->country  = $request->country;
            // $customer->state  = $request->state;
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
            // $shippingAddress->country  = $request->shipping_country;
            // $shippingAddress->state  = $request->shipping_state;
            $shippingAddress->city  = $request->shipping_city;
            $shippingAddress->post_code  = $request->shipping_post_code;

            $shippingAddress->save();
        }

        if(session()->has('shipping_address')){
            session()->forget('shipping_address');
        }

        $sizes = Size::get();
       
        $invoceData = [
            'sizes' =>  $sizes,
            'order' =>  $order,
        ];

        $customer->user->notify((new PlaceOrderMail($invoceData)));
       
        Cart::clear();

        return \redirect()->to('/');
        // return view('frontend.shopping.checkout');
    }


   


    
    


    

}
