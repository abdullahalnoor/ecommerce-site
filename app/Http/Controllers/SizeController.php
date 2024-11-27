<?php

namespace App\Http\Controllers;

use App\Size;
use Illuminate\Http\Request;
use Session;
use DB;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::get();
        return view('admin.size.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.size.create',get_defined_vars());
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

        try{
          
            $size = new Size();
            $size->name = $request->name;
            $size->status = isset($request->status) ? $request->status : 1 ;
            $size->save();
            DB::commit();
            $status = true;
    
       }catch(\Exception  $e){
           $message = $e->getMessage();
           DB::rollback();
           $status = false;
           return back()->with('error','Please fill out form correctly...');
       }
        
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.size.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        return view('admin.size.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $this->validate($request,$this->rules());

        try{
          
            $size->name = $request->name;
            $size->status = isset($request->status) ? $request->status : 1 ;
            $size->save();
            DB::commit();
            $status = true;
    
       }catch(\Exception  $e){
           $message = $e->getMessage();
           DB::rollback();
           $status = false;
           return back()->with('error','Please fill out form correctly...');
       }
        
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.size.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        //
    }

    private function rules(){
        return [
            'name' => 'required|max:250|string',
            'status' => 'nullable',
        ];
    }
}
