<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Session;
use Image;
use DB;

class BrandController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create',get_defined_vars());
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
        $this->validate($request,[
            'slug' => 'required|max:150|string|unique:brands',
        ]);
        DB::beginTransaction();


        try{
           
      

        $brand = new Brand();

        if($request->hasFile('image')){

            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'frontend/images/brands/';
            $image = Image::make($originalImage);
            $image->resize(152,77);
            $imageFullPath = $imagePath.$imageName;
            $this->globalImageSave($image,$imageFullPath);

            $brand->image =   $imageFullPath ;
        }
        

        $brand->name = $request->name;
        $brand->slug = $request->slug;
        $brand->status = isset($request->status) ? $request->status : 1 ;
        $brand->save();

        DB::commit();
        $status = true;

        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $this->validate($request,$this->rules());
        $this->validate($request,[
            'slug' => 'required|max:150|string|unique:brands,slug,'.$brand->id,
        ]);

        DB::beginTransaction();
        try{

     
        if($request->hasFile('image')){

          
            $this->globalImageUnlink($brand->image);

            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'frontend/images/brands/';
            $image = Image::make($originalImage);
            $image->resize(152,77);
            
            $imageFullPath = $imagePath.$imageName;
            $this->globalImageSave($image,$imageFullPath);

            $brand->image =  $imageFullPath;
        }

        $brand->name = $request->name;
        $brand->slug = $request->slug;
        $brand->status = isset($request->status) ? $request->status : 1 ;
        $brand->save();

        DB::commit();
        $status = true;
    }catch(\Exception  $e){
        $message = $e->getMessage();
        DB::rollback();
        $status = false;
        return back()->with('error','Please fill out form correctly...');
    }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }

    private function rules(){
        return [
            'name' => 'required|max:120|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'status' => 'required',
        ];
    }

}
