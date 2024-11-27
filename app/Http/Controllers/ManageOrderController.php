<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\OrderDetail;
use App\ShippingAddress;
use App\Customer;
use Session;
use App\ProductStock;
use DB;

class ManageOrderController extends Controller
{
    public function viewOrders(){

        // $orders = Order::with('orderDetail')->with('shippingAddress')->get();
        $orders = Order::with('user')->get();
         return view('admin.order.index',get_defined_vars());
    }

     public function viewOrderDetail($id){

        $order = Order::with('user')->with('shippingAddress')->find($id);
        $customer = Customer::where('user_id',$order->user->id)->first();
        $orderDetail  = OrderDetail::where('order_id',$id)->with('product')->get();
        // return $orderDetail;

         return view('admin.order.order-detail',get_defined_vars());
    }

    public function deleteOrderItem($id){

        $orderDetail = OrderDetail::find($id);
        $orderDetail->delete();
        Session::flash('success','Item Deleted Successfully..');
         return back();
    }

    public function updateOrderItem(Request $request){
        // return $request->all();
         $orderDetail = OrderDetail::find($request->order_item_id);
        $orderDetail->quantity = $request->item_quantity;
        $orderDetail->save();
        Session::flash('success','Item Updated Successfully..');
         return back();
        
    }

    public function updateOrderStatus(Request $request){

     
        DB::beginTransaction();

        try{
          
            $order = Order::with('orderDetail')->find($request->order_id);
            if($order->stock_transfer == 1 ){
                 if($request->order_status == 2 || $request->order_status == 3 ){
     
                     foreach($order->orderDetail as $key => $orderItm){
                         $productStock = ProductStock::where('product_id',$orderItm->product_id)
                                                         ->where('size_id',$orderItm->size_id)
                                                         ->first();
                          $productStock->purchase_qty += $orderItm->quantity;                                 
                          $productStock->sales_qty -= $orderItm->quantity;
                          $productStock->save();                                 
                     }
     
                     $order->stock_transfer = 0 ;
                     $order->order_status = $request->order_status;
                     $order->save();
                 }else if($request->order_status == 4  ){
                     $order->order_status = $request->order_status;
                     $order->save();
                 }
            }else{
                 if($request->order_status == 1 || $request->order_status == 4 ){
                     foreach($order->orderDetail as $key => $orderItm){
                         $productStock = ProductStock::where('product_id',$orderItm->product_id)
                                                         ->where('size_id',$orderItm->size_id)
                                                         ->first();
                         $productStock->purchase_qty -= $orderItm->quantity;                                 
                         $productStock->sales_qty += $orderItm->quantity;
                         $productStock->save();                                 
                     }
                     $order->stock_transfer = 1 ;
                     $order->order_status = $request->order_status;
                     $order->save();
                 }else if($request->order_status == 2 || $request->order_status == 3 ){
                     $order->order_status = $request->order_status;
                     $order->save();
                 }
            }
            
            

        DB::commit();
        $status = true;
    
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
       
        Session::flash('success','Order Updated Successfully..');
        return back();
    }
    


    
}
