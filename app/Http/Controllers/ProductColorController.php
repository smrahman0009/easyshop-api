<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductColor;
use Faker\Provider\ar_SA\Color;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = ProductColor::all();
        return view('product_color.index')->with('colors',$colors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
            ]);
        $color = new ProductColor();
        $color->name = $request->name;
        // dd($color->save());
        $color->save();

        toastr()->success('Success!', 'Color created successfully.');

        return redirect()->back();
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
        $color = ProductColor::find($id);
        return view('product_color.update')->with('color',$color);
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
        $color = ProductColor::find($id);
        
        $color->name = $request->name;
        
        $color->update();
        toastr()->success('Color updatted successfully');
        
        return redirect()->route('product_color.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = ProductColor::find($id);
        $color->delete();
        toastr()->success('Success!','Color deleted successfully');
        return redirect()->back();
    }
}
