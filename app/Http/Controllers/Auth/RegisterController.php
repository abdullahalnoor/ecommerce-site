<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'name' => 'nullable|string|max:191',
            'first_name' => 'nullable|string|max:191',
            'last_name' => 'nullable|string|max:191',
            'mobile' => 'nullable|string|max:191',
            'phone' => 'nullable|string|max:191',
            'address_one' => 'nullable|string|max:191',
            'address_two' => 'nullable|string|max:191',
            'country' => 'nullable|string|max:191',
            'state' => 'nullable|string|max:191',
            'city' => 'nullable|string|max:191',
            'post_code' => 'nullable|string|max:191',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        // dd($data);
        $user =  User::create([
            // 'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $customer = new Customer();
        $customer->user_id = $user->id;
        // $customer->first_name = $data['first_name'];
        // $customer->last_name = $data['last_name'];
        // $customer->mobile = $data['mobile'];
        // $customer->phone = $data['phone'];
        // $customer->address_one = $data['address_one'];
        // $customer->address_two = $data['address_two'];
        // $customer->country = $data['country'];
        // $customer->state = $data['state'];
        // $customer->city = $data['city'];
        // $customer->post_code = $data['post_code'];
        $customer->save();
       
        return $user;

    }


     /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $pageTitle = 'Sign Up';
        return view('customer.auth.register',\get_defined_vars());
    }
}
