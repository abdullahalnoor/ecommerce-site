<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use Image;
use DB;
use App\Category;
use App\Brand;
use App\BrandProduct;
use App\ProductImage;
use Illuminate\Support\Str;
use App\Size;
use App\ProductStock;
use App\PurchaseProduct;



class ProductController extends Controller
{

  


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $roles = Category::all();

        // Product::all()->each(function ($user) use ($roles) { 
        //     $user->categories()->attach(
        //         $roles->random(rand(1, 3))->pluck('id')->toArray()
        //     ); 
        // });

        $products = Product::get();
                            // return  $products;
                            // return  $products[0]->name;
        return view('admin.product.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        return view('admin.product.create',get_defined_vars());
    }
    public function getSubCategory($id)
    {
        return Category::where('parent_id', $id)->where('status',1)->get();
      
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
        $slug = Str::slug($request->slug, '-');
        $this->validate($request,[
            'slug' => 'required|max:190|string|unique:products',
        ]);

        DB::beginTransaction();

        try{
          

            $product = new Product();
           
            // $product->brand_id = isset($request->brand_id) ? $request->brand_id :  0;

            $product->name = $request->name;
            $product->slug = $slug;
            $product->code = $request->code;
            $product->purchase_price = $request->purchase_price;
            $product->sales_price = $request->sales_price;
            $product->reduce_price = $request->reduce_price;
            $product->description = $request->description;
            $product->product_specification = $request->product_specification;
            $product->product_type = isset($request->product_type)  ? $request->product_type : 1 ;
            $product->status = isset($request->status) ? $request->status : 1 ;
            $product->featured = isset($request->featured) ? $request->featured : 0;
            $product->new = isset($request->new) ? $request->new : 0;

            
            if($request->hasFile('thumbnail')){
    
                $originalImage = $request->file('thumbnail');
                
                $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
                $thumbnailPath = 'frontend/images/products/thumbnails/';
                $image = Image::make($originalImage);
                $image->resize(260,260);
              
                $imageFullPath = $thumbnailPath.$imageName;
                $this->globalImageSave($image,$imageFullPath);

                $product->thumbnail = $thumbnailPath.$imageName;
     
            }


            


            $product->save();
          
            $product->categories()->attach($request->category_id,['created_at'=>now(), 'updated_at'=>now()]);

    
            if($request->hasFile('images')){
    
               $images = $request->file('images');

               foreach($images as $image){
                $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
                $originalPath = 'frontend/images/products/images/';
                $image = Image::make($image);
                $image->resize(800,800);
              
                $imageFullPath = $originalPath.$imageName;
                $this->globalImageSave($image,$imageFullPath);

                $productImage = new ProductImage();
                $productImage->image = $originalPath.$imageName;
                $productImage->product_id = $product->id;
                $productImage->save(); 
             }

           }

           DB::commit();
           $status = true;
     
      
        }catch(\Exception  $e){
          return  $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }



        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.product.index');
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
        $categories = Category::where('status',1)->get();

        $product =  Product::with('productImages')->find($id);
        
         $brands = Brand::where('status',1)->get();
       
        
        return view('admin.product.edit',get_defined_vars());
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
        $product =  Product::find($id);
        $this->validate($request,$this->rules());
        $slug = Str::slug($request->slug, '-');
        $this->validate($request,[
            'slug' => 'required|max:190|string|unique:products,slug,'.$product->id,
        ]);

        DB::beginTransaction();


        try{
          
            
            // $product->brand_id = isset($request->brand_id) ? $request->brand_id :  0;
          
            $product->name = $request->name;
            $product->slug = $slug;
            $product->code = $request->code;
            $product->purchase_price = $request->purchase_price;
            $product->sales_price = $request->sales_price;
            $product->reduce_price = $request->reduce_price;
            // $product->offer = isset($request->reduce_price)  ? 1 : 0 ;
            
            $product->product_specification = $request->product_specification;
            $product->description = $request->description;
            $product->product_type = isset($request->product_type)  ? $request->product_type : 1 ;
            $product->status = isset($request->status)  ? $request->status : 1 ;
            $product->featured = isset($request->featured) ? $request->featured : 0;
            $product->new = isset($request->new) ? $request->new : 0;


            if($request->hasFile('thumbnail')){

                $this->globalImageUnlink($product->thumbnail);
 
                $originalImage = $request->file('thumbnail');
                
                $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
                $thumbnailPath = 'frontend/images/products/thumbnails/';
                $image = Image::make($originalImage);
                $image->resize(260,260);
            
                
                $imageFullPath = $thumbnailPath.$imageName;
                $this->globalImageSave($image,$imageFullPath);

                $product->thumbnail = $thumbnailPath.$imageName;
     
            }


            $product->save();

            $product->categories()->detach();

            $product->categories()->attach($request->category_id,['created_at'=>now(), 'updated_at'=>now()]);

    
    
            if($request->hasFile('images')){
    
               $images = $request->file('images');

               foreach($images as $image){
                   
               

                $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
                $originalPath = 'frontend/images/products/images/';
                $image = Image::make($image);
                $image->resize(800,800);
               
                $imageFullPath = $originalPath.$imageName;
                $this->globalImageSave($image,$imageFullPath);

                $productImage = new ProductImage();
                $productImage->image = $originalPath.$imageName;
                $productImage->product_id = $product->id;
                $productImage->save(); 
             }

           }

           DB::commit();
           $status = true;
     

          
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }

      
          
    
           
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }

    public function deleteProductImage($id){
        try{
           
       
            $productImage =  ProductImage::find($id);

            $this->globalImageUnlink($productImage->image);
            $productImage->delete();

            DB::commit();
            $status = true;
           
            }catch(\Exception  $e){
                $message = $e->getMessage();
                DB::rollback();
                $status = false;
                return back()->with('error','Please fill out form correctly...');
            }
        return back();
    }




    public function createStock($id){
        // Session::flash('success','Information Saved Successfully..');
        $product =  Product::find($id);
    //  return   $sizes = Size::skip(1)->take(1);
        $count = Size::count();
        $skip = 1;
        $limit = $count - $skip; // the limit
        $sizes = Size::skip($skip)->take($limit)->get();
        $productStocks = ProductStock::where('product_id',$id)->with('size')->get();
        return view('admin.product.add-stock',\get_defined_vars());
    }

    public function saveInStock(Request $request){
        // ProductStock PurchaseProduct
       
 
            // return $request->all();

            $this->validate($request,[
                'size_id' => 'required',
                'quantity' => 'required',
            ]);
        DB::beginTransaction();

        try{
          
            $purchaseProduct = new PurchaseProduct();
            $purchaseProduct->quantity = $request->quantity;
            $purchaseProduct->size_id = $request->size_id;
            $purchaseProduct->product_id = $request->product_id;
            // $purchaseProduct->status = isset($request->status) ? $request->status : 1 ;
            $purchaseProduct->save();


            $productStock =  ProductStock::where('product_id', $request->product_id)
                                            ->where('size_id',$request->size_id)
                                            ->first();
            if($productStock){
                $productStock->purchase_qty += $request->quantity;
                $productStock->save();
            }else{
                $productStock = new ProductStock();
                $productStock->purchase_qty = $request->quantity;
                $productStock->sales_qty = 0;
                $productStock->size_id = $request->size_id;
                $productStock->product_id = $request->product_id;
                $productStock->save();
            }                        
          
            DB::commit();
            $status = true;
    
       }catch(\Exception  $e){
           $message = $e->getMessage();
           DB::rollback();
           $status = false;
           return back()->with('error','Please fill out form correctly...');
       }
        
        Session::flash('success','Information Saved Successfully..');
        return back();
    }



    

    public function allOffer(){
        
        $products =  Product::whereIn('offer',[1,2])->get();

        return view('admin.product.view-offer',\get_defined_vars());
    }

    public function createOffer($id){
        
        $product =  Product::find($id);



        Session::flash('success','Information Saved Successfully..');

        return view('admin.product.offer',\get_defined_vars());
    }

    public function saveOffer(Request $request){
        
        $product =  Product::find($request->product_id);
        $product->reduce_price = $request->reduce_price;
        $product->offer = $request->offer;
        $product->save();
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.product.all.offer');
    }






    private function rules(){
        return [
            'category_id' => 'nullable',
            'brand_id' => 'nullable',

            'name' => 'required|max:160|string',

            'code' => 'nullable|max:50|string',

           

            'purchase_price' => 'nullable|between:0,999999999.9999|numeric',

            'sales_price' => 'required|between:0,999999999.9999|numeric',


            'reduce_price' => 'nullable|required_with:reduce_price_bn|between:0,999999999.9999|numeric',

            'status' => 'nullable',
            'featured' => 'nullable',
            'new' => 'nullable',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ];
    }





}
