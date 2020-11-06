<?php 
namespace App\Helpers;
use Illuminate\Support\Facades\Storage;
use Image;

class ImageHelper {

    private $previewSizes = array(
        'xs' => array('width'=> 150, 'height' => 150),
        'sm' => array('width'=> 200, 'height' => 200),
        'md' => array('width'=> 250, 'height' => 250),
        'lg' => array('width'=> 300, 'height' => 300),
        'xl' => array('width'=> 400, 'height' => 400),
    );
    private $viewSizes = array(
        'xs' => array('width'=> 300, 'height' => 200),
        'sm' => array('width'=> 768, 'height' => 512),
        'md' => array('width'=> 1024, 'height' => 683),
        'lg' => array('width'=> 1536, 'height' => 1024),
        'xl' => array('width'=> 2048, 'height' => 1365),

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

    public function resizeImagePost($image,$imageName, $destinationPath, $maintainAspectRatio, $responsiveImageSizes, $imageWidth="", $imageHeight="")
    {

        $img = Image::make($image->getRealPath());
        $img->save("${destinationPath}${imageName}.jpg");
        if($responsiveImageSizes){
            foreach($this->previewSizes as $previewSize => $previewSizeAspectRatio){
            $img = Image::make($image->getRealPath());
            $img->resize($previewSizeAspectRatio['width'], $previewSizeAspectRatio['height'], function ($constraint) use ($maintainAspectRatio) {
                if($maintainAspectRatio){
                    $constraint->aspectRatio();
                }
            })->save("${destinationPath}${imageName}-preview-${previewSize}.jpg");
        }

        foreach($this->viewSizes as $viewSize => $viewSizeAspectRatio){
            $img = Image::make($image->getRealPath());
            $img->resize($viewSizeAspectRatio['width'], $viewSizeAspectRatio['height'], function ($constraint) use ($maintainAspectRatio) {
                if($maintainAspectRatio){
                    $constraint->aspectRatio();
                }
            })->save("${destinationPath}${imageName}-view-${viewSize}.jpg");
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
        foreach($this->previewSizes as $previewSize => $previewSizeAspectRatio){
            $imageToDelete = str_replace(".jpg", "-preview-${previewSize}.jpg",$imagePath);
            Storage::delete(str_replace("/storage", "public/", $imageToDelete));
        }
        foreach($this->viewSizes as $viewSize => $viewSizeAspectRatio){
            $imageToDelete = str_replace(".jpg", "-view-${viewSize}.jpg",$imagePath);
            Storage::delete(str_replace("/storage", "public/", $imageToDelete));   
        }
    }
        Storage::delete(str_replace("/storage", "public/", $imagePath));   

    }
}