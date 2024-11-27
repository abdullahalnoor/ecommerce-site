<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected function globalImageSave($image,$imageFullPath){
        $image->save(public_path().'/'.$imageFullPath);
    }
    protected function globalImageUnlink($imagePath){
        @unlink(public_path().'/'.$imagePath);
    }

    protected function globalFileSave($file,$fileFullPath){
        $file->move(public_path().'/'.$fileFullPath);
    }

    
}
