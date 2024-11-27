<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Image;
use DB;
use App\Offer;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
        return view('admin.offer.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.offer.create',get_defined_vars());
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
 
       
 
         $offer = new Offer();
 
         if($request->hasFile('icon')){
 
             $originalImage = $request->file('icon');
             $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
             $imagePath = 'frontend/images/offers/';
             $image = Image::make($originalImage);
             $image->resize(55,35);
             $imageFullPath = $imagePath.$imageName;
             $this->globalImageSave($image,$imageFullPath);
 
             $offer->icon =   $imageFullPath ;
         }
         
 
         $offer->title = $request->title;
         $offer->status = isset($request->status) ? $request->status : 1 ;
         $offer->save();

         DB::commit();
         $status = true;
 
         }catch(\Exception  $e){
             $message = $e->getMessage();
             DB::rollback();
             $status = false;
             return back()->with('error','Please fill out form correctly...');
         }
         Session::flash('success','Information Saved Successfully..');
         return \redirect()->route('admin.offer.index');
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
        $offer =  Offer::find($id);
        return view('admin.offer.edit',get_defined_vars());
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

      

        $offer =  Offer::find($id);

        if($request->hasFile('icon')){

            $this->globalImageUnlink($offer->icon);


            $originalImage = $request->file('icon');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'frontend/images/offers/';
            $image = Image::make($originalImage);
            $image->resize(55,35);
            $imageFullPath = $imagePath.$imageName;
            $this->globalImageSave($image,$imageFullPath);

            $offer->icon =   $imageFullPath ;
        }
        

        $offer->title = $request->title;
        $offer->status = isset($request->status) ? $request->status : 1 ;
        $offer->save();

        DB::commit();
        $status = true;

        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.offer.index');
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
            'title' => 'required|max:120|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg',
            'status' => 'nullable',
        ];
    }
}
