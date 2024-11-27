<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteSetting;
use Session;

class SiteSettingController extends Controller
{
    public function index(){
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
        }
        return view('admin.settings.index',get_defined_vars());
    }

    public function update(Request $request){

            $this->validate($request,$this->rules());

            $siteSetting = SiteSetting::first();
            $siteSetting->site_name = $request->site_name;
            $siteSetting->site_owner = $request->site_owner;
            $siteSetting->site_developed_by = $request->site_developed_by;
            $siteSetting->site_copyright_ownership = $request->site_copyright_ownership;
            $siteSetting->site_maintenance_by = $request->site_maintenance_by;
            $siteSetting->site_address	 = $request->site_address;
            $siteSetting->site_phone = $request->site_phone;
            $siteSetting->site_email = $request->site_email;
            $siteSetting->site_url = $request->site_url;
            $siteSetting->save();
            Session::flash('success','Information Updated Successfully..');
            return back();
    }
    private function rules(){
        return [
           'site_name' => 'required|max:150',
           'site_owner' => 'required|max:150',
           'site_developed_by' => 'required|max:150',
           'site_copyright_ownership' => 'required|max:150',
           'site_maintenance_by' => 'required|max:150',
           'site_address'	 => 'required|max:150',
           'site_phone' => 'required|max:150',
           'site_email' => 'required|max:150',
           'site_url' => 'required|max:150',
        ];
    }
}
