<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Customer;
use Session;
use DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\User;
use App\Notifications\ForgetPasswordNotification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;


class AuthorizationController extends Controller
{
   

    public function  forgetPassword(){
    
        return view('customer.auth.forget-password',\get_defined_vars());
    }

    public function sendResetPasswordMail(Request $request){
    //    return $request->email;
// return        $user = User::get();
        $user = User::where('email',$request->email)->first();
        // $user->random_url = Str::random(120);
        // $time = date('Y-m-d H:i:s');
        // $newtime = strtotime($time.'+ 3 minute');
        // $user->sent_time = date('Y-m-d H:i:s', $newtime);
        // $user->save();
        // $user->notify((new ForgetPasswordNotification()));
        // Session::flash('success',' Check your Email  ..');
        
        if($user){

            if($user->sent_time  < date('Y-m-d H:i:s') ){
               
                $user->random_url = Str::random(120);
                $time = date('Y-m-d H:i:s');
                $newtime = strtotime($time.'+ 3 minute');
                $user->sent_time = date('Y-m-d H:i:s', $newtime);
                $user->save();
                $user->notify((new ForgetPasswordNotification()));
                Session::flash('success',' Check your Email  ..');
                
               
                
            }else {
                Session::flash('error',' An Email already sent ..');
                
            }
     
        }else {
            Session::flash('error',' Invalid Email Address..');
            
        }
        return back();
        
    }
    


    
  public function resetPasswordForm($url){
     $user = User::where('random_url',$url)->first();
    
     if($user && \strlen($user->random_url) == 120){
       
        $reset_key = \encrypt($user->id).'.'.Crypt::encryptString($user->email);
        Session::flash('success',$user->customer->first_name.' Reset Your Password..');
        return view('customer.auth.reset-password',\get_defined_vars());
     }
     return redirect()->route('frontend.home'); 
  }

  public function resetPassword(Request $request){

   
    $this->validate($request,[
        'password' => 'required|string|min:8|confirmed',
    ]);

    $reset_key =  \explode('.',$request->reset_key);
    $id =  \decrypt($reset_key[0]);
    $email =  Crypt::decryptString($reset_key[1]);
    $user = User::where('id',$id)
                ->where('email',$email)
                ->first();
    if($user){
       
        $user->password = \bcrypt($request->password);
        $user->random_url = Str::random(100);
        $user->save();
         Session::flash('success','Hi ! '.$user->customer->first_name.', Your Password Chnaged Successfully..');
       
    }else{
         Session::flash('error','Please Passwor doesn\'t Match..');
    }
   
   
    return \redirect()->route('login');
    
  }

  
}
