<?php

namespace App\Http\Controllers;

use App\Product;
use App\Brand;
use App\ProductType;
use App\Helpers\ImageHelper;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $productTypes = ProductType::all();
        return view('product.create')->with(['brands'=>$brands,'productTypes'=>$productTypes]);
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
        $color = $request->input('color');
        $price = $request->input('price');
        $sizes = $request->input('sizes');
        $brand_id = $request->input('brand');
        $type_id = $request->input('type');
        $imageHelper = new ImageHelper;
        $image = $request->file('productImage');
        $imageName = str_replace(' ','',$name).$imageHelper->randomStringGenerator().".jpg";
        $destinationPath = public_path('/storage/product_images/');
        $imageHelper->resizeImagePost($image, $imageName, $destinationPath,800,800,true);
        $path = "/storage/product_images/".$imageName;
        $product = new Product;
        $product->name = $name;
        $product->color = $color;
        $product->price = $price;
        $product->size = $sizes;
        $product->image = $path;
        $product->brand_id = $brand_id;
        $product->type_id = $type_id;
        $product->save();
        return redirect('/products');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($productId)
    {
        $product = Product::find($productId);
        return view('product.show')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($productId)
    {
        $product = Product::find($productId);
        $brands = Brand::all();
        $productTypes = ProductType::all();
        return view('product.edit')->with(['productTypes'=>$productTypes,'brands'=>$brands,'product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$productId)
    {
        $name = $request->input('name');
        $color = $request->input('color');
        $price = $request->input('price');
        $sizes = $request->input('sizes');
        $brand_id = $request->input('brand');
        $type_id = $request->input('type');
        $image = $request->file('productImage');
        $product = Product::find($productId);
        $imageHelper = new ImageHelper;
        if($image){
            $imageName = $name.$imageHelper->randomStringGenerator().".jpg";
            $destinationPath = public_path('/storage/product_images/');
            $imageHelper->resizeImagePost($image, $imageName, $destinationPath,800,800,true);
            $path = "/storage/product_images/".$imageName;
            $product->image = $path;
        }
       
        $product->name = $name;
        $product->color = $color;
        $product->price = $price;
        $product->size = $sizes;
        $product->brand_id = $brand_id;
        $product->type_id = $type_id;
        $product->save();
        return redirect('/products');
    }

    
}
