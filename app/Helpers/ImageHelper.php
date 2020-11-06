<?php 
namespace App\Helpers;
use Illuminate\Support\Facades\Storage;
use Image;

class ImageHelper {

    private $previewSizes = array(
        'sm' => array('width'=> 150, 'height' => 150),
        'md' => array('width'=> 200, 'height' => 200),
        'lg' => array('width'=> 250, 'height' => 250),
        'xl' => array('width'=> 300, 'height' => 300),
    );
    private $viewSizes = array(
        'sm' => array('width'=> 300, 'height' => 200),
        'md' => array('width'=> 768, 'height' => 512),
        'lg' => array('width'=> 1024, 'height' => 683),
        'xl' => array('width'=> 1536, 'height' => 1024),
    );

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

    public function resizeImagePost($image,$imageName, $destinationPath, $imageWidth="", $imageHeight="", $maintainAspectRatio, $responsiveImageSizes)
    {

        $img = Image::make($image->getRealPath());
        $img->save("${destinationPath}${imageName}.jpg");
        if($responsiveImageSizes){
            foreach($this->previewSizes as $previewSize){
            $img = Image::make($image->getRealPath());
            $img->resize($previewSize['width'], $previewSize['height'], function ($constraint) use ($maintainAspectRatio) {
                if($maintainAspectRatio){
                    $constraint->aspectRatio();
                }
            })->save("${destinationPath}${imageName}-preview-${previewSize['width']}x${previewSize['height']}.jpg");
        }

        foreach($this->viewSizes as $viewSize){
            $img = Image::make($image->getRealPath());
            $img->resize($viewSize['width'], $viewSize['height'], function ($constraint) use ($maintainAspectRatio) {
                if($maintainAspectRatio){
                    $constraint->aspectRatio();
                }
            })->save("${destinationPath}${imageName}-view-${viewSize['width']}x${viewSize['height']}.jpg");
        }
    }
    else{
        $img->resize($imageWidth, $imageHeight, function ($constraint) use ($maintainAspectRatio) {
            if($maintainAspectRatio){
                $constraint->aspectRatio();
            }
        })->save("${destinationPath}${imageName}.jpg");
    }
    }

    public function deleteImages($imagePath, $responsiveImageSizes){
        if($responsiveImageSizes){
        foreach($this->previewSizes as $previewSize){
            $imageToDelete = str_replace(".jpg", "-preview-${previewSize['width']}x${previewSize['height']}.jpg",$imagePath);
            Storage::delete(str_replace("/storage", "public/", $imageToDelete));
        }
        foreach($this->viewSizes as $viewSize){
            $imageToDelete = str_replace(".jpg", "-view-${viewSize['width']}x${viewSize['height']}.jpg",$imagePath);
            Storage::delete(str_replace("/storage", "public/", $imageToDelete));   
        }
    }
        Storage::delete(str_replace("/storage", "public/", $imagePath));   

    }
}