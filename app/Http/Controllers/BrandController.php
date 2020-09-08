<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate(10);
        return view('brand.index')->with('brands',$brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $imageHelper = new ImageHelper;
        $image = $request->file('brandLogo');
        //set the name of image as name of the brand and some random string remove all spaces in name
        $imageName = str_replace(' ','',$name).$imageHelper->randomStringGenerator().".jpg";
        $destinationPath = public_path('/storage/brand_images/');
        $imageHelper->resizeImagePost($image, $imageName, $destinationPath,626,626,false);
        $path = "/storage/brand_images/".$imageName;
        $brand = new Brand;
        $brand->name = $name;
        $brand->image = $path;
        $brand->save();
        return redirect('/brands');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($brandId)
    {
        $brand = Brand::find($brandId);
        return view('brand.edit')->with('brand',$brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $brandId)
    {
        $name = $request->input('name');
        $imageHelper = new ImageHelper;
        $image = $request->file('brandLogo');
        $brand = Brand::find($brandId);
        if($image){
            //set the name of image as name of the brand and some random string remove all spaces in name
            $imageName = str_replace(' ','',$name).$imageHelper->randomStringGenerator().".jpg";
            $destinationPath = public_path('/storage/brand_images/');
            $imageHelper->resizeImagePost($image, $imageName, $destinationPath,626,626,false);
            $path = "/storage/brand_images/".$imageName;
            $brand->image = $path;
        }
        $brand->name = $name;
        $brand->save();
        return redirect('/brands');
    }

    

    
    
}
