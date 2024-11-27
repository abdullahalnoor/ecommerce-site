<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Image;
use DB;
use App\ServiceDetail;
use App\Service;

class ServiceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceDetails =  ServiceDetail::with('service')->get();
        return view('admin.service-details.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::where('status',1)->get();
        return view('admin.service-details.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,$this->rules());

        DB::beginTransaction();
        try{

      

        $serviceDetail = new ServiceDetail();

        if($request->hasFile('image')){

            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'frontend/images/service/details/';
            $image = Image::make($originalImage);
            $image->resize(470,300);
            $imageFullPath = $imagePath.$imageName;
            $this->globalImageSave($image,$imageFullPath);
            // return $imageFullPath;

            $serviceDetail->image =  $imageFullPath;
        }
        

        $serviceDetail->service_id = $request->service_id;
        $serviceDetail->title = $request->title;
        $serviceDetail->description = $request->description;
        $serviceDetail->status = isset($request->status) ? $request->status : 1 ;
        $serviceDetail->save();

        DB::commit();
        $status = true;

        }catch(\Exception  $e){
          return  $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.service-detail.index');
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
        $services = Service::where('status',1)->get();
         $serviceDetail = ServiceDetail::with('service')->find($id);
        return view('admin.service-details.edit',get_defined_vars());
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
        $this->validate($request,$this->rules());

        DB::beginTransaction();
        try{

      

        $serviceDetail =  ServiceDetail::find($id);

        if($request->hasFile('image')){

            $this->globalImageUnlink($serviceDetail->image);

            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'frontend/images/service/details/';
            $image = Image::make($originalImage);
            $image->resize(470,300);
            $imageFullPath = $imagePath.$imageName;
            $this->globalImageSave($image,$imageFullPath);
            // return $imageFullPath;

            $serviceDetail->image =  $imageFullPath;
        }
        

        $serviceDetail->service_id = $request->service_id;
        $serviceDetail->title = $request->title;
        $serviceDetail->description = $request->description;
        $serviceDetail->status = isset($request->status) ? $request->status : 1 ;
        $serviceDetail->save();

        DB::commit();
        $status = true;

        }catch(\Exception  $e){
          return  $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.service-detail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function rules(){
        return [
            'title' => 'required|max:190|string',
            'description' => 'required',
            'service_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'status' => 'nullable',
        ];
    }
}
