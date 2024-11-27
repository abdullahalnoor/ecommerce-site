<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Customer;
use App\User;
use App\Product;

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return 1;
        $totalOrders = Order::count();
        $totalCustomer = Customer::count();
        $totalUser = User::count();
        $totalProducts = Product::count();
        return view('admin.home.index',\get_defined_vars());
    }
}
