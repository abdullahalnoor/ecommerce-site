<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use View;
use DB;
use App\SiteSetting;
use App\Category;
use App\Brand;

use App\PaymentGateway;
use App\Customer;
// use  App\Observers\CustomerObserver;
use App\Product;
// use  App\Observers\ProductObserver;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if(!Session::has('language')){
            Session::put('language','bn');
        }

        
        View::composer('*',function($view){
           $categories = Category::whereIn('type',[1])
           ->where('status',1)
           ->get();
          
           $brands = Brand::where('status',1)
           ->get();

           
           
           $paymentsGatways = PaymentGateway::where('status',1)->get();
            $view->with('shareable_data',[
                'categories'=>$categories,
                'paymentsGatways'=>$paymentsGatways,
                'brands'=>$brands,
                ]);
        });
       
        View::composer('*',function($view){
            $siteSetting = SiteSetting::first();
            
            if(!$siteSetting){
                $siteSetting = new SiteSetting();
                $siteSetting->site_name = 'Phoenix Softweare';
                $siteSetting->site_owner = 'Phoenix Softweare';
                $siteSetting->site_developed_by = 'Phoenix Softweare';
                $siteSetting->site_copyright_ownership = 'Phoenix Softweare';
                $siteSetting->site_maintenance_by = 'Md Abdullah Al Noor';
                $siteSetting->site_address	 = '68-69 Green Road, Suite # k, Concept Tower (4th Floor) , Dhaka 1205';
                $siteSetting->site_phone = '01783366975 ';
                $siteSetting->site_email = 'info@phoenixsoftbd.com';
                $siteSetting->site_url = 'http://phoenixsoftbd.com/';
                $siteSetting->save();
                $siteSetting = cache()->rememberForever('siteSetting',function() use ($siteSetting){
                    return $siteSetting->format();
                });
              
            }else{
                $siteSetting = cache()->rememberForever('siteSetting',function() use ($siteSetting){
                    return $siteSetting->format();
                });
            }
            
           
            $view->with('site_settings',cache()->get('siteSetting'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
