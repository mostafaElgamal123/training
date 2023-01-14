<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product,Category};
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.pages.product.index",[
            'product'=>Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.product.create",[
            'category'=>Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>"required|min:3|max:150",
            'price'=>"required|numeric|min:1|max:50",
            "image"=>"required|mimes:jpg,png|max:1000",
            "description"=>"required|min:3|max:10000",
            "category_id"=>"required|exists:categories,id",
        ]);
        $file=$request->file("image");
        $filename=date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('/images/').$filename);
        $product=Product::create($request->all());
        $product->image=$filename;
        $product->save();
        return back()->with("success","added");
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
    public function edit(Product $product)
    {
        return view("admin.pages.product.edit",[
            'category'=>Category::all(),
            'product'=>$product
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        $request->validate([
            'title'=>"required|min:3|max:150",
            'price'=>"required|numeric|min:1|max:50",
            "image"=>"nullable|mimes:jpg,png|max:1000",
            "description"=>"required|min:3|max:10000",
            "category_id"=>"required|exists:categories,id",
        ]);
        if($request->has("image")){
            $file=$request->file("image");
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/images/').$filename);
            if(file_exists(public_path('/images/').$product->image)){
                unlink(public_path('/images/').$product->image);
            }
            $product->update($request->all());
            $product->image=$filename;
            $product->save();
        }else{
            $product->update($request->all());
        }
        return back()->with("success","updated");
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
