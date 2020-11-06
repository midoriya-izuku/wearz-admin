<?php

namespace App\Http\Controllers;

use App\ProductType;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productTypes = ProductType::paginate(10);
        return view('productType.index')->with('productTypes',$productTypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productType.create');
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
        $image = $request->file('productTypeImage');
        //set the name of image as name of the productType and some random string remove all spaces in name
        $imageName = str_replace(' ','',$name).$imageHelper->randomStringGenerator();
        $destinationPath = public_path('/storage/product_types/');
        $imageHelper->resizeImagePost($image, $imageName, $destinationPath,626,626,false, false);
        $path = "/storage/product_types/${imageName}.jpg";
        $productType = new ProductType;
        $productType->name = $name;
        $productType->image = $path;
        $productType->save();
        return redirect('/productTypes');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit($productTypeId)
    {
        $productType = ProductType::find($productTypeId);
        return view('productType.edit')->with('productType',$productType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productTypeId)
    {
        $name = $request->input('name');
        $imageHelper = new ImageHelper;
        $image = $request->file('productTypeImage');
        $productType = ProductType::find($productTypeId);
        $prevImage = $productType->image;
        if($image){
            //set the name of image as name of the productType and some random string remove all spaces in name
            $imageName = str_replace(' ','',$name).$imageHelper->randomStringGenerator();
            $destinationPath = public_path('/storage/product_types/');
            $imageHelper->resizeImagePost($image, $imageName, $destinationPath, 626, 626, false, false);
            $path = "/storage/product_types/${imageName}.jpg";
            $productType->image = $path;
            $imageHelper->deleteImages($prevImage, false);
        }
        $productType->name = $name;
        $productType->save();
        return redirect('/productTypes');
    }

}
