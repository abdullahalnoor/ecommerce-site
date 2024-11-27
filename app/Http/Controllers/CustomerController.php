<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;

use Illuminate\Support\Arr;
use DB;

class CustomerController extends Controller
{
    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customers = Customer::all();
        return view('admin.customer.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,$this->rules());

        DB::beginTransaction();

        try{
           
       
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->opening_balance = $request->opening_balance;
        $customer->save();

        DB::commit();
        $status = true;
      
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }

       
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer =  Customer::find($id);
        return view('admin.customer.customer-product',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $customer =  Customer::find($id);
        return view('admin.customer.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,$this->rules());

        DB::beginTransaction();

        try{
           
       
        $customer =  Customer::find($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->opening_balance = $request->opening_balance;
        $customer->save();

        DB::commit();
        $status = true;
      
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        
     

        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function delete($id){
        $customer =  Customer::find($id);
       
        $customer->delete();
        Session::flash('success','Information Deleted Successfully..');
        return back();
    }

    private function rules(){
        return [
            'name' => 'required|max:120|string',
            'email' => 'nullable|max:100|string',
            'phone' => 'nullable|max:50|string',
            'address' => 'nullable|max:200|string',
            'opening_balance' => 'nullable|numeric|between:0,9999999999.9999',
        ];
    }
}
