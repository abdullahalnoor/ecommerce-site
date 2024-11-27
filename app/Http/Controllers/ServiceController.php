<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Image;
use DB;
use App\Service;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services =  Service::get();
        return view('admin.service-category.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service-category.create',get_defined_vars());
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
 
       
 
         $service = new Service();
 
         if($request->hasFile('image')){
 
             $originalImage = $request->file('image');
             $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
             $imagePath = 'frontend/images/service/category/';
             $image = Image::make($originalImage);
             $image->resize(270,168);
             $imageFullPath = $imagePath.$imageName;
             $this->globalImageSave($image,$imageFullPath);
 
             $service->image =   $imageFullPath ;
         }
         
 
         $service->name = $request->name;
         $service->status = isset($request->status) ? $request->status : 1 ;
         $service->save();

         DB::commit();
         $status = true;
 
         }catch(\Exception  $e){
             $message = $e->getMessage();
             DB::rollback();
             $status = false;
             return back()->with('error','Please fill out form correctly...');
         }
         Session::flash('success','Information Saved Successfully..');
         return \redirect()->route('admin.service.index');
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
         $service =  Service::find($id);
        return view('admin.service-category.edit',get_defined_vars());
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

      

        $service =  Service::find($id);

        if($request->hasFile('image')){

            $this->globalImageUnlink($service->image);

            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'frontend/images/service/category/';
            $image = Image::make($originalImage);
            $image->resize(270,168);
            $imageFullPath = $imagePath.$imageName;
            $this->globalImageSave($image,$imageFullPath);

            $service->image =   $imageFullPath ;
        }
        

        $service->name = $request->name;
        $service->status = isset($request->status) ? $request->status : 1 ;
        $service->save();

        DB::commit();
        $status = true;

        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.service.index');
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
            'name' => 'required|max:120|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'status' => 'nullable',
        ];
    }
}
