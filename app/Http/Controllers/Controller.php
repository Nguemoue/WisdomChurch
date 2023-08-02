<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function saveCroppedImage($data,$to_path=null){
        if($to_path == null)
            $to_path = "poster";
        $image_parts = explode(";base64,",$data);
        $img_aux = explode("image/",$image_parts[0]);
        $ext = $img_aux[1];
        $data = $image_parts[1];
        $data = base64_decode($data);
        $name = $to_path."/".uniqid().".".$ext;
        $res = Storage::put($name,$data);
        return $name;
    }


}
