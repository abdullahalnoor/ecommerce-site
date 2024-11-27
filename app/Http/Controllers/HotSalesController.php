<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HotSales;
use App\Product;
use Session;
use Image;
use DB;


class HotSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotSales = HotSales::with('product')->get();
        return view('admin.hot-sales.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.hot-sales.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,$this->rules());
        // return $request->all();
        
        DB::beginTransaction();

        try{
           
      

        $hotSales = new HotSales();
        $hotSales->product_id = $request->product_id;
        $hotSales->price = $request->price;
        $hotSales->status = isset($request->status) ? $request->status : 1 ;
        $hotSales->start_date = isset($request->start_date) ? $request->start_date : null ;
        $hotSales->end_date = isset($request->end_date) ? $request->end_date : null ;
        $hotSales->save();

        DB::commit();
        $status = true;

        }catch(\Exception  $e){
           return $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.hot-sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::all();
        $hotSales =  HotSales::find($id);
        return view('admin.hot-sales.edit',get_defined_vars());
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
        // return $request->all();
        $this->validate($request,$this->rules());
        // return $request->all();
        DB::beginTransaction();


        try{
           
      

        $hotSales =  HotSales::find($id);
        $hotSales->product_id = $request->product_id;
        $hotSales->price = $request->price;
        $hotSales->status = isset($request->status) ? $request->status : 1 ;
        $hotSales->start_date = isset($request->start_date) ? $request->start_date : null ;
        $hotSales->end_date = isset($request->end_date) ? $request->end_date : null ;
        $hotSales->save();

        DB::commit();
        $status = true;

        }catch(\Exception  $e){
           return $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.hot-sales.index');
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

    private function rules(){
        return [
            'product_id' => 'required|max:120|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'price' => 'required',
            'status' => 'nullable',
        ];
    }
}
