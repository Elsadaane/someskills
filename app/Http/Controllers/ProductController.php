<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category_Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category_Product::all();
        $products = Product::with('category')->get();
        return view('backend.pages.Product.index', compact('products' , 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category_Product::all();
        return view('backend.pages.Product.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prodeced = $request->except('image');
        if($request->has('image')){
            $image = $request->file('image');
            $image_name = uniqid().$image->getClientOriginalName();
            $image->move("product_category",$image_name);
            $image_path = "product_category/".$image_name;
            $prodeced['image'] = $image_path;
        }
        // dd($prodeced);
        $prodeced['slug'] = Str::slug($request->product_name_ar , '-');
        Product::create($prodeced);
        toastr()->success('Product Category Created Successfully');
        return redirect()->route('Product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $Product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Product = Product::findOrFail($id);
        $categories = Category_Product::all();
        return view('backend.pages.Product.edit', compact('Product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $prodeced = $request->except('image');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move("product_category", $image_name);
            $image_path = "product_category/" . $image_name;

            // استبدال الصورة القديمة بالجديدة
            $prodeced['image'] = $image_path;
        } else {
            // إذا لم يتم رفع صورة جديدة، احتفظ بالصورة القديمة
            $prodeced['image'] = $product->image;
        }
        $prodeced['slug'] = Str::slug($request->product_name_ar , '-');
        $product->update($prodeced);
        toastr()->success('Product Category Updated Successfully');
        return redirect()->route('Product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->delete();
        toastr()->success('Product Catogry Deleted Successfully');
        return redirect()->route('Product.index');
    }
}