<?php

namespace App\Services;
use Illuminate\Support\Facades\File;


class ImagesOperations {

    public function upload($path, $image = null) {
        if($image) {
            
            $imageName = time().'.'.$image->getClientOriginalExtension();
            File::put($path . '/' . $imageName, File::get($image));
            return $imageName;
        }
        
        return null;
    }
}