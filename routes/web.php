<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', function() {
    // \Config::set(['app.timezone' => 'Bangladesh/Dhaka']);
   Artisan::call('config:cache');
	 Artisan::call('config:clear');
	 Artisan::call('cache:clear');
	 Artisan::call('view:clear');
	 Artisan::call('route:clear');
	 Artisan::call('clear-compiled');
	return 'DONE'; 
  });


Route::get('/v2', function () {
   
    return view('welcome');
});




Route::group(['as'=>'frontend.','namespace'=>'Frontend'],function(){


  // pages route
  Route::get('/contact', 'WelcomeController@contactPage')->name('contact');
  Route::get('/terms-conditions', 'WelcomeController@termsConditionPage')->name('terms-conditions');
  Route::get('/privacy-policy', 'WelcomeController@privacyPolicytPage')->name('privacy-policy');
  Route::get('/membership', 'WelcomeController@membershipPage')->name('membership');
  Route::get('/surprise-card', 'WelcomeController@surpriseCardPage')->name('surprise-card');

  
  // end pages route
    

    Route::get('/', 'WelcomeController@index')->name('home');

    Route::get('/offer', 'WelcomeController@viewOfferProduct')->name('offer');

    Route::get('/category/product/{id?}/{search?}', 'WelcomeController@category')->name('category');
   
    Route::get('/product/{id}/detail', 'WelcomeController@productDetail')->name('product.detail');
    Route::get('/product/{id}/images', 'WelcomeController@productImages')->name('product.image');
    Route::get('/product/serach/products', 'WelcomeController@searchProducts')->name('product.serach');
    Route::post('/product/serach/products', 'WelcomeController@searchProducts');




    Route::get('/cart', 'CartController@index')->name('cart');

    // genertal route for cart
    //  route for standard product cart
    Route::get('/cart/{id}/standard/add', 'CartController@addStandarProductToCart')->name('add.standard.cart');
    Route::post('/cart/standard/add/form', 'CartController@saveStandarProductToCart')->name('add.standard.cart.form');
     //  route for variant product cart
    Route::post('check/product/availability', 'CartController@checkProductAvailability')->name('cehck.product.availability');
    Route::post('check/variant/add/form', 'CartController@saveVariantProductToCart')->name('add.variant.cart.form');

    // cart view page cart route
    Route::get('/cart/{id}/remove', 'CartController@removeCartItem')->name('remove.cart');
    Route::get('/cart/{id}/increment', 'CartController@incrementCartQuantity')->name('increment.cart');
    Route::get('/cart/{id}/decrement', 'CartController@decrementCartQuantity')->name('decrement.cart');
    
   // end used cart route



    Route::put('/cart/add/{id}/form', 'CartController@addToCartForm')->name('add.cart.form');
    Route::get('/cart/{id}/update', 'CartController@updateCartItem')->name('update.cart');
    Route::post('/cart/all/update', 'CartController@updateAllCartItem')->name('update.all.cart');
    // Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout');
    // Route::post('/cart/place-order', 'CartController@placeOrder')->name('cart.place-order');

    
});

Route::group(['as'=>'frontend.','namespace'=>'Frontend','middleware' => ['auth:web']],function(){
    
  Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout');
  Route::post('/cart/place-order', 'CartController@placeOrder')->name('cart.place-order');


});



Auth::routes();


Route::group(['prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function(){

  Route::get('/login', 'LoginController@showLoginForm')->name('login');
  Route::post('/login', 'LoginController@login');
   
 
});


Route::group(['prefix'=>'admin','as'=>'admin.','middleware' => 'auth:admin'],function(){
  
    Route::post('/logout', 'AdminController@logout')->name('logout');
    Route::get('/home', 'AdminController@index')->name('home');
    Route::get('setting','SiteSettingController@index')->name('setting.index');
    Route::post('setting','SiteSettingController@update');
    
    Route::resource('category','CategoryController');
   
    Route::resource('hot-sales','HotSalesController');
    
    Route::resource('slider','SliderController');

    Route::resource('page','PageController');

    
    Route::resource('color','ColorController');

    Route::resource('size','SizeController');

    Route::resource('brand','BrandController');
 

    Route::resource('offer','OfferController');
 
    
    Route::resource('product','ProductController');
    Route::get('fetch/sub-category/{id}','ProductController@getSubCategory')->name('fetch.sub-category');
    Route::get('delete/product-image/{id}','ProductController@deleteProductImage')->name('delete.product-image');
   
    Route::get('product/stock/{id?}/create','ProductController@createStock')->name('product.create.stock');
    Route::post('product/stock/save','ProductController@saveInStock')->name('product.save.stock');

    Route::get('product/offer/all/offer','ProductController@allOffer')->name('product.all.offer');
    Route::get('product/offer/{id?}/create','ProductController@createOffer')->name('product.create.offer');
    Route::post('product/offer/save','ProductController@saveOffer')->name('product.save.offer');


    
    Route::get('/view/orders', 'ManageOrderController@viewOrders')->name('view.orders');
    Route::get('/view/{id}/order-detail', 'ManageOrderController@viewOrderDetail')->name('view.order-detail');
   
    Route::get('/delete/{id}/order/item', 'ManageOrderController@deleteOrderItem')->name('delete.order.item');
    Route::post('/update/order/item', 'ManageOrderController@updateOrderItem')->name('update.order.item');
    Route::post('/update/order/status', 'ManageOrderController@updateOrderStatus')->name('update.order.status');


    
    
});



Route::group(['prefix'=>'customer','as'=>'customer.','middleware' => 'auth:web'],function(){
  Route::get('/home', 'HomeController@index')->name('home');
  // Route::get('change-password', 'ChangePasswordController@editPasswor')->name('change.password');
  Route::post('change-password', 'HomeController@updatePassword')->name('change.password');
  Route::post('change-profile', 'HomeController@updateProfile')->name('update.profile');
  Route::get('update/{id}/order', 'HomeController@editOrder')->name('edit.order');
  Route::post('update/order', 'HomeController@updateOrder')->name('update.order');

});


Route::group(['prefix'=>'customer','as'=>'customer.'],function(){
 
  Route::get('/forget-password','AuthorizationController@forgetPassword')->name('forget.password');
  Route::post('/forget-password','AuthorizationController@sendResetPasswordMail');
  Route::get('/reset-password/{url}','AuthorizationController@resetPasswordForm')->name('reset.password');
  Route::post('/reset-password','AuthorizationController@resetPassword')->name('update.reset.password');
});


Route::get('/admin', function () {
  return redirect('/admin/login');
});
