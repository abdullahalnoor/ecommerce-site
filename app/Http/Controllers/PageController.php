<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use DB;
use Session;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::get();
        
        return view('admin.page.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
       
        return view('admin.page.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {

        DB::beginTransaction();

        try{
           
        
        // if($request->hasFile('image')){

        //     $this->globalImageUnlink($slider->image);
            
        //     $originalImage = $request->file('image');
        //     $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
        //     $imagePath = 'frontend/images/sliders/';
        //     $image = Image::make($originalImage);
        //     if($request->feature == 1){
        //         $image->resize(570,321);
        //      }else{
        //         $image->resize(1920,800);
        //      }
     
        //     $imageFullPath = $imagePath.$imageName;
        //     $this->globalImageSave($image,$imageFullPath);

        //     $page->image =  $imagePath.$imageName;
        // }
        
       
        $page->en_description = $request->en_description;
        $page->bn_description = $request->bn_description;
        $page->save();

        DB::commit();
        $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
