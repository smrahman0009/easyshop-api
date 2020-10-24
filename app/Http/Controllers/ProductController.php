<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\SubCategory;
use Faker\Provider\ar_SA\Color;
use Intervention\Image\Facades\Image;
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
        $subCategories = SubCategory::all();
        // dd($subCategories);
        return view('product.index')->with('subCategories',$subCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subCategories = SubCategory::all();
        $colors = ProductColor::all();
        $sizes = ProductSize::all();
        return view('product.create')->with(['subCategories'=>$subCategories,'colors'=>$colors,'sizes'=>$sizes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
       $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'discount'=>'required',
            'size_id'=>'required',
            'color_id'=>'required',
            'subcategory_id'=>'required',
        ]);

        $images = array();
        for($i = 0; $i < count($request->images); $i++){

            $image = $request->images[$i];
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('upload/product',$image_new_name);
            $image_path = public_path("/upload/product/". $image_new_name);
            $images[] = "upload/product/" . $image_new_name;
            $img = Image::make($image_path)->resize(1920, 1080, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($image_path);
        }

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'discount' => $request->discount,
            'size_id' => $request->size_id,
            'color_id' => $request->color_id,
            'subcategory_id' => $request->subcategory_id,
            'description' => $request->description,
        ]);

        ProductImage::create([
            'product_id' => $product->id,
            'image_1' => $images[0],
            'image_2' => $images[1],
            'image_3' => $images[2],
        ]);
        dd(asset($images[0]));
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
        //
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
        //
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
}
