<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Session;
use Image;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
         $categories = Category::whereNotIn('type',[2])->get();
        //  $categories = Category::get();
   
        return view('admin.category.index',get_defined_vars());
    }

   
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.category.create',get_defined_vars());
    }

  


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return  $request->all();
        $this->validate($request,$this->rules());

        DB::beginTransaction();
        try{
    
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->order_no = $request->order_no;
        
        $category->status = isset($request->status) ? $request->status : 1 ;

        if($request->hasFile('image')){
 
          
           $originalImage = $request->file('image');
           
           $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
           $imagePath = 'frontend/images/categories/images/';
           $image = Image::make($originalImage);
           $image->resize(270,168);
           $imageFullPath = $imagePath.$imageName;
           $this->globalImageSave($image,$imageFullPath);

           $category->image = $imagePath.$imageName;

       }

        if($request->hasFile('icon')){
        
        $originalImage = $request->file('icon');
        
        $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
        $imagePath = 'frontend/images/categories/icons/';
        $image = Image::make($originalImage);
 
        $imageFullPath = $imagePath.$imageName;
        $this->globalImageSave($image,$imageFullPath);

        $category->icon = $imagePath.$imageName;

        }


        $category->save();
        $category->parents()->attach($request->parent_id,['created_at'=>now(), 'updated_at'=>now()]);

        DB::commit();
        $status = true;
    }catch(\Exception  $e){
     return   $message = $e->getMessage();
        DB::rollback();
        $status = false;
        return back()->with('error','Please fill out form correctly...');
    }
        
       
        return \redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // return $category->parents;
        $categories = Category::get();
        return view('admin.category.edit',get_defined_vars());
    }

   

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        
        $this->validate($request,$this->rules($category->id));


        DB::beginTransaction();
        try{
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->order_no = $request->order_no;
        
        $category->status = isset($request->status) ? $request->status : 1 ;

        
 
            
            if($request->hasFile('image')){
 
              
                $this->globalImageUnlink($category->image);
                
                $originalImage = $request->file('image');
                
                $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
                $imagePath = 'frontend/images/categories/images/';
                $image = Image::make($originalImage);
                $image->resize(270,168);
                $imageFullPath = $imagePath.$imageName;
                $this->globalImageSave($image,$imageFullPath);
     
                $category->image = $imagePath.$imageName;
     
            }
     
             if($request->hasFile('icon')){

                 $this->globalImageUnlink($category->icon);
         
             $originalImage = $request->file('icon');
             
             $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
             $imagePath = 'frontend/images/categories/icons/';
             $image = Image::make($originalImage);
      
             $imageFullPath = $imagePath.$imageName;
             $this->globalImageSave($image,$imageFullPath);
     
             $category->icon = $imagePath.$imageName;
     
             }

             $category->save();
             $category->parents()->detach();
             $category->parents()->attach($request->parent_id,['created_at'=>now(), 'updated_at'=>now()]);
     
        DB::commit();
        $status = true;
    }catch(\Exception  $e){
        $message = $e->getMessage();
        DB::rollback();
        $status = false;
        return back()->with('error','Please fill out form correctly...');
    }

        return \redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    private function rules($id=null){
        return [
            'name' => 'required|max:120|string',
            'staus' => 'nullable',
            'slug' => !isset($id) ? 'nullable|max:191|unique:categories' :'nullable|max:191|unique:categories,slug,'.$id,
        ];
    }
}
