<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller
{
    public function changeLanguage(){
      
        if(Session::has('language')){
            if( Session::get('language') == 'en'){
                Session::forget('language','en');
                Session::put('language','bn');
            }
            else if( Session::get('language') == 'bn'){
                Session::forget('language','bn');
                Session::put('language','en');
            }
        }else{
            Session::put('language','bn');
        }
        return back();
    }
   
}
