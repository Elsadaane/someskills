<?php

namespace App\Http\Controllers;

use App\Models\Category_Product;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryProductController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category_Product::all();
        return view('backend.pages.CategoryOfProduct.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.CategoryOfProduct.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{

    $data = $request->except('image');
    if($request->hasFile('image')){
        $image = $request->image;
        $name = uniqid() . $image->getClientOriginalName();
        $image->move('category' , $name);
        $image_path = "category/". $name;
        $data['image'] =$image_path;
    }

    $data['slug'] =  Str::slug($request->name_en , '-');
    Category_Product::create($data);

    toastr()->success('Category Created Successfully');
    return redirect()->route('CategoryOfProduct.index');
}


    /**
     * Display the specified resource.
     */
    public function show(Category_Product $catogry_product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category_Product::findOrFail($id);
        return view ('backend.pages.CategoryOfProduct.update' , compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $Product = Category_Product::findOrFail($request->id);

        $data = $request->except('image');
    if($request->hasFile('image')){
        $image = $request->image;
        $name = uniqid() . $image->getClientOriginalName();
        $image->move('category' , $name);
        $image_path = "category/". $name;
        $data['image'] =$image_path;
    }

         $data['slug'] =  Str::slug($request->name_en , '-');
          $Product->update($data);

        toastr()->success('Category Updated Successfully');

        return redirect()->route('CategoryOfProduct.index');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $product = Category_Product::findOrFail($request->id);
        $product->delete();
        toastr()->deleted('Category Deleted Successfully');
        return redirect()->route('CategoryOfProduct.index');
    }
    public function allproductbelong($id){
        $productes = Product::where('category_product_id' , $id)->get();
        return view('backend.pages.CategoryOfProduct.ProductbelongCatogry' , compact('productes'));
    }
}
