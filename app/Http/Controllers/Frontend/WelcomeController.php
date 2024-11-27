<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Session;
// use Image;
use DB;
use App\Category;

use App\Quote;

use App\Brand;

use App\Slider;
use App\Product;
use App\ProductImage;
use Session;
use Cart;
use App\HotSales;
use Auth;
use App\Page;

class WelcomeController extends Controller
{



    public function contactPage(){
        return view('frontend.pages.contact',\get_defined_vars());
    }

    public function termsConditionPage(){
        $page = Page::findOrFail(1);
        return view('frontend.pages.terms-conditions',\get_defined_vars());
    }


    public function privacyPolicytPage(){
        $page = Page::findOrFail(2);
        return view('frontend.pages.privacy-policy',\get_defined_vars());
    }

    public function membershipPage(){
        $page = Page::findOrFail(3);
        return view('frontend.pages.membership',\get_defined_vars());
    }


    public function surpriseCardPage(){
        $page = Page::findOrFail(4);
        return view('frontend.pages.surprise-card',\get_defined_vars());
    }


    

    private function sliders() {
        $sliders = Slider::where('status',1)
                        ->where('feature','!=',1)
                        ->orderBy('id','desc')
                        ->get();
        return  $sliders;
    }


    public function index(){



        $pageTitle = 'Home';

   

        $latestProducts = Product::where('new',1)
                    ->where('status',1)
                    ->with('hotSales')
                    ->with('categories')
                    ->with('brand')
                    ->with('productStocks')
                    ->get();

       $featuredProducts = Product::where('featured',1)
                    ->where('status',1)
                    ->with('hotSales')
                    ->with('categories')
                    ->with('brand')
                    ->with('productStocks')
                    ->get(); 

        
  

        $gentsCategories = Category::where('slug','gents')->first();

        $gentsProducts = Product::whereHas('categories', function ($query) use($gentsCategories) {
                            $query->where('category_id', $gentsCategories->id);
                        })->where('status',1)
                        ->with('hotSales')
                        ->with('categories')
                        ->with('brand')
                        ->with('productStocks')
                        ->take(10)
                        ->get(); 
                        
      $ladiesCategories = Category::where('slug','ladies')->first();
    //   return   $ladiesCategories->childrens;

      $ladiesProducts = Product::whereHas('categories', function ($query) use($ladiesCategories) {
                                              $query->where('category_id', $ladiesCategories->id);
                                          })->where('status',1)
                                          ->with('hotSales')
                                          ->with('categories')
                                          ->with('brand')
                                          ->with('productStocks')
                                          ->take(10)
                                          ->get();                 


         $hotSalesProducts =  HotSales::where('status',1)
                                    ->with('product')
                                    ->get();
                    
       $appData =   [
                'hotSalesProducts' =>  $hotSalesProducts,
                'gentsCategories' =>  $gentsCategories,
                'ladiesCategories' =>  $ladiesCategories,
                'ladiesProducts' =>  $ladiesProducts,
                'gentsProducts' =>  $gentsProducts,
                'latestProducts' =>  $latestProducts,
                'featuredProducts' =>  $featuredProducts,
                'sliders' =>  $this->sliders(),
            ];

        return view('frontend.home.index',get_defined_vars());
    }

    


  









    public function category(Request $request, $id,$filter=null){


            // $filter = explode('-',$filter);

            // return $id;
            // return $filter[0];

        //   try{
        //     $id = decrypt($id);
        // } catch(\RuntimeException $e) {
        //     // Content is not encrypted.
        // }


        
            $pageTitle = Category::with('parents')->find($id);

        
                if($filter){
                    $filter = explode('-',$filter);
                    $min_value = $filter[0];
                    $max_value = $filter[1];
                    $products = Product::whereHas('categories', function ($query) use($id) {
                        $query->where('category_id', $id);
                    })->where('status',1)
                        ->whereBetween('sales_price', [$min_value, $max_value])
                        ->with('hotSales')
                        ->with('brand')
                        ->with('productStocks')
                        ->paginate(16);
                }else{
                    $products = Product::whereHas('categories', function ($query) use($id) {
                        $query->where('category_id', $id);
                    })->where('status',1)
                        ->with('hotSales')
                        ->with('brand')
                        ->with('productStocks')
                        ->paginate(16);
                }
                
         
           

            $latestProducts = Product::where('new',1)
            ->where('status',1)
            
            ->with('hotSales')
            ->with('brand')
            ->with('productStocks')
            ->take(5)
            ->get();


        $appData =   [
            'latestProducts' =>  $latestProducts,
            'products' =>  $products,
        ];

        if($request->ajax()){
            return view('frontend.product.load',\get_defined_vars())->render();
        }
        return view('frontend.product.category',get_defined_vars());
    }




    

    public function viewOfferProduct(){

        $pageTitle = "Offer";
        $products = Product::where('offer',1)
            ->where('status',1)
            ->with('hotSales')
            ->with('brand')
            ->with('productStocks')
            ->paginate(15);

        $latestProducts = Product::where('new',1)
            ->where('status',1)
            ->with('hotSales')
            ->with('brand')
            ->with('productStocks')
            ->take(5)
            ->get();


        $appData =   [
            'latestProducts' =>  $latestProducts,
            'products' =>  $products,
        ];

        // if($request->ajax()){
        //     return view('frontend.product.load',\get_defined_vars())->render();
        // }
        return view('frontend.product.search',get_defined_vars());
    }



    

    
  


    


 

    public function productDetail($id){
       
        // return $id;
       
        $productDetail = Product::with('productImages')
                    ->with('hotSales')
                    ->with('brand')
                    ->with('productStocks')
                    ->find($id);
       
         $pageTitle = 'Product Details';

         $relatedProducts = Product::where('status',1)
         ->with('brand')
         ->with('hotSales')
         ->with('productStocks')
         ->take(15)
         ->get();

         



         $currentCartItem = null;

         if($productDetail->product_type ==  1){
            if($productDetail->productStocks->count() > 0){
            $sizeId = $productDetail->productStocks[0]->size_id;
            $stockQuantity = $productDetail->productStocks[0]->purchase_qty;
            foreach(Cart::getContent() as $content){
                if($content->attributes->product_id == $productDetail->id && $content->attributes->size_id == $sizeId){
                   $currentCartItem = $content;
                }
            }
         }
        }
       
         
        //   if($currentCartItem){
        //         if((int) $stockQuantity == (int) $currentCartItem->quantity){
        //             return false;
        //         }
        //     }
        

        $appData =   [
            'relatedProducts' => $relatedProducts,
            'productDetail' => $productDetail,
            'currentCartItem' => $currentCartItem,
        ];

        if($productDetail->product_type == 2){
            return view('frontend.product.variant-product-detail',get_defined_vars());
        }
        return view('frontend.product.standard-product-detail',get_defined_vars());
    }

    public function productImages($id){
        $productImages = ProductImage::where('product_id',$id)->get()->pluck('image');
        return $productImages;
        // $productImages = \json_encode($productImages);
        // return response()
            // ->json(['productImages' => $productImages ]);
    }


    public function searchProducts(Request $request){

        // return $request->all();

                $pageTitle = 'Search Result';
                // $products
               if(isset($request->category_id)  && isset($request->serach_input)){
                    // $products =  Product::where('category_id',$request->category_id)
                    // ->where('name', 'like', '%'.$request->serach_input. '%')
                    // ->where('status',1)
                    // ->with('hotSales')
                    // ->with('productStocks')
                    // ->paginate(15);
                    $id = $request->category_id;

                    $products = Product::whereHas('categories', function ($query) use($id) {
                        $query->where('category_id', $id);
                    })
                    ->where('name', 'like', '%'.$request->serach_input. '%')
                    ->where('status',1)
                    ->with('hotSales')
                    ->with('brand')
                    ->with('productStocks')
                    ->paginate(16);

               }else if(isset($request->category_id)){
                  $id = $request->category_id;
                    $products = Product::whereHas('categories', function ($query) use($id) {
                        $query->where('category_id', $id);
                    })
                    ->where('name', 'like', '%'.$request->serach_input. '%')
                    ->where('status',1)
                    ->with('hotSales')
                    ->with('brand')
                    ->with('productStocks')
                    ->paginate(16);
               } else if(!empty($request->serach_input)){
                // return 1;
                $products =  Product::where('name', 'like', '%'.$request->serach_input. '%')
                    ->where('status',1)
                    ->with('hotSales')
                    ->with('brand')
                    ->with('productStocks')
                    ->paginate(16);
               }

                





    
                $latestProducts =    Product::where('status',1)
                ->with('hotSales')
                ->with('brand')
                ->with('productStocks')
                ->paginate(16);
    
    
            $appData =   [
                'latestProducts' =>  $latestProducts,
                'products' =>  $products,
            ];
            return view('frontend.product.search',get_defined_vars());
    }


   

    
    

}
