<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use Session;
use DB;


class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::get();
        return view('admin.color.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color.create',get_defined_vars());
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
          
            $color = new Color();
            $color->name = $request->name;
            $color->status = isset($request->status) ? $request->status : 1 ;
            $color->save();
            DB::commit();
            $status = true;
    
       }catch(\Exception  $e){
           $message = $e->getMessage();
           DB::rollback();
           $status = false;
           return back()->with('error','Please fill out form correctly...');
       }
        
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.color.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view('admin.color.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $this->validate($request,$this->rules());
        DB::beginTransaction();

        try{
          
            $color->name = $request->name;
            $color->status = isset($request->status) ? $request->status : 1 ;
            $color->save();
            DB::commit();
            $status = true;
    
       }catch(\Exception  $e){
           $message = $e->getMessage();
           DB::rollback();
           $status = false;
           return back()->with('error','Please fill out form correctly...');
       }
        
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.color.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
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
