<?php 
namespace App\Helpers;
use Image;

class ImageHelper {
    public function randomStringGenerator() { 
        $n = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $randomString = ''; 
        for ($i = 0; $i < $n; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        } 
      
        return $randomString; 
    } 

    public function resizeImagePost($image,$imageName, $destinationPath,$imageWidth,$imageHeight,$maintainAspectRatio)
    {
        $img = Image::make($image->getRealPath());
        $img->resize($imageWidth,$imageHeight, function ($constraint) use ($maintainAspectRatio) {
            if($maintainAspectRatio){
                $constraint->aspectRatio();
            }
        })->save($destinationPath.$imageName);
    }
}