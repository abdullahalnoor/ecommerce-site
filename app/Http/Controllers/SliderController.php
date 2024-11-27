<?php

namespace App\Http\Controllers;

use App\Slider;
use App\Product;
use Illuminate\Http\Request;
use Session;
use Image;
use DB;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::with('product')->get();
        
        return view('admin.slider.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.slider.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  return $request->all();
         $this->validate($request,$this->rules());

         DB::beginTransaction();


         try{
         
         $slider = new Slider();
 
         if($request->hasFile('image')){
 
             $originalImage = $request->file('image');
             $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
             $imagePath = 'frontend/images/sliders/';
             $image = Image::make($originalImage);
             if($request->feature == 1){
                $image->resize(570,321);
             }else{
                $image->resize(1920,800);
             }
             
            
             $imageFullPath = $imagePath.$imageName;
             $this->globalImageSave($image,$imageFullPath);
 
             $slider->image =  $imagePath.$imageName;
         }
         
 
         $slider->title = $request->title;
        //  $slider->product_id = $request->product_id;
         $slider->status = isset($request->status) ? $request->status : 1 ;
         $slider->feature = isset($request->feature) ? $request->feature : 0 ;
         $slider->save();

         DB::commit();
         $status = true;
     
  

     
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
         
         Session::flash('success','Information Saved Successfully..');
         return \redirect()->route('admin.slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $products = Product::all();
        return view('admin.slider.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        // return $slider;
        // return $slider->product_id;
        // return $request->all();
        $this->validate($request,$this->rules());
        DB::beginTransaction();

        try{
          
        if($request->hasFile('image')){

            $this->globalImageUnlink($slider->image);
            
            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'frontend/images/sliders/';
            $image = Image::make($originalImage);
            if($request->feature == 1){
                $image->resize(570,321);
             }else{
                $image->resize(1920,800);
             }
     
            $imageFullPath = $imagePath.$imageName;
            $this->globalImageSave($image,$imageFullPath);

            $slider->image =  $imagePath.$imageName;
        }
        
       
        $slider->title = $request->title;
        // $slider->product_id = $request->product_id;
        $slider->status = isset($request->status) ? $request->status : 1 ;
        $slider->feature = isset($request->feature) ? $request->feature : 0 ;
        $slider->save();

        DB::commit();
        $status = true;
    
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
    }

    private function rules(){
        return [
            'title' => 'nullable|max:250|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'status' => 'nullable',
        ];
    }
}