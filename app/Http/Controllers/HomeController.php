<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Customer;
use App\Order;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return $user = auth()->user()->with('orders');
         $orders = Order::where('user_id',auth()->user()->id)->get();
        // return $orders[0]->orderDetail;
        return view('customer.home.index',\get_defined_vars());
    }
    public function updatePassword(Request $request)
    {

        $current_password = auth()->user()->password;           
        if(!\Hash::check($request->current_password, $current_password)){
            // return 1;
            return back()->with('error','Your current password does not match');
        }

        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = auth()->user();     
        $user->password = \bcrypt($request->password);
        $user->save();
            // return $user;
        // return back();
        return back()->with('success','Your password change successfully');
    }


    public function updateProfile(Request $request)
    {
        $this->validate($request,[
            'mobile' => 'required|min:10|max:15|string',
            'phone' => 'nullable|min:7|max:15',
            'address_one' => 'required|max:150',
            'address_two' => 'nullable|max:150',
            'first_name	' => 'nullable|max:150',
            'last_name' => 'nullable|max:150',
            'city' => 'required|max:30',
            'post_code' => 'nullable|max:6',
        ]);

        $customer =  Customer::where('user_id',auth()->user()->id)->first();
        $customer->first_name  = $request->first_name;
        $customer->last_name  = $request->last_name;
        $customer->mobile  = $request->mobile;
        $customer->phone  = $request->phone;
        $customer->address_one  = $request->address_one;
        $customer->address_two  = $request->address_two;
        // $customer->country  = $request->country;
        // $customer->state  = $request->state;
        $customer->city  = $request->city;
        $customer->post_code  = $request->post_code;
        $customer->save();

        return back()->with('success','Info saved successfully');

    }


    public function editOrder($id){

        $order = Order::with('orderDetail')->findOrFail($id);
        // return $order->orderDetail[0]->product;

        return view('customer.home.order-details',\get_defined_vars());
    }
        public function updateOrder(Request $request){

       
        // return $request->shipping_address;
        // return $request->all();
        // if (!$request->filled('shipping_address_check')) {
        //     return 1;
        // }
        // return 0;

        $this->validate($request,[
            'mobile' => 'required|min:10|max:15|string',
            'phone' => 'nullable|max:15',
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
       
        Cart::clear();
        return \redirect()->to('/');
        // return view('frontend.shopping.checkout');
    }












}
