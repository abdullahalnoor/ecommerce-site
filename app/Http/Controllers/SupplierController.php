<?php

namespace App\Http\Controllers;

use Session;
use App\Supplier;
use Illuminate\Http\Request;
use  App\Contracts\SupplierInterface;

class SupplierController extends Controller
{
    private $supplierInterface;

    public function __construct(SupplierInterface $supplierInterface){
        $this->supplierInterface = $supplierInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = $this->supplierInterface->all();
        return view('admin.supplier.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.create',get_defined_vars());
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
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->opening_balance = $request->opening_balance;
        $supplier->save();
        $this->supplierInterface->created($supplier);
       
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.supplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        $supplier =  Supplier::find($id);
        return view('admin.supplier.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $this->validate($request,$this->rules());
        $supplier =  Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->opening_balance = $request->opening_balance;
        $supplier->save();
        
        $this->supplierInterface->updated($supplier);

        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
    public function delete($id){
        $supplier =  Supplier::find($id);
        $this->supplierInterface->deleted($supplier);
        $supplier->delete();
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
