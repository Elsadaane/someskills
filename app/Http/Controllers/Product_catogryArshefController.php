<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_Catogry;
use Illuminate\Http\Request;

class Product_catogryArshefController extends Controller
{
    public function index()
    {
        $productes = Product::with('category')->onlyTrashed()->get();
        return view('backend.pages.product.arshif' , compact('productes'));
    }
    public function update($id)
    {
        $product = Product::withTrashed()->where('id', $id)->restore();
        if ($product) {
            session()->flash('success', 'تم استرجاع المنتج بنجاح');
            toastr()->success('تم استرجاع المنتج بنجاح');
            return redirect()->route('Product.index');
        }

    }
    public function destroy($id)
    {
        $product = Product::withTrashed()->where('id', $id)->first();
        if ($product->trashed()) {
            $product->forceDelete();
            session()->flash('success', 'تم حذف المنتج نهائيا');
            toastr()->success('تم حذف المنتج نهائيا');
            return redirect()->route('Product.index');
        } else {
            $product->delete();
            session()->flash('success', 'تم نقل المنتج الى الارشيف');
            toastr()->success('تم نقل المنتج الى الارشيف');
            return redirect()->route('Product.index');
        }
    }
}