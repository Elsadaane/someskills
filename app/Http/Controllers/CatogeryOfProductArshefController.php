<?php

namespace App\Http\Controllers;

use App\Models\Category_product;
use Illuminate\Http\Request;

class CatogeryOfProductArshefController extends Controller
{
    public function index(){
        $categories = Category_product::onlyTrashed()->get();
        return view('backend.pages.CategoryOfProduct.CategoryOfProductArshef',compact('categories'));
    }
    public function show($id){
        $product = Category_product::onlyTrashed()->findOrFail($id);
        $product->restore();
        toastr()->success('تم استعادة القسم بنجاح');
        return redirect()->route('CategoryOfProductArchives.index');
    }
    public function destroy($id){
        $product = Category_product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();
        toastr()->deleted('تم حذف القسم بنجاح');
        return redirect()->route('CategoryOfProductArchives.index');
    }
}
