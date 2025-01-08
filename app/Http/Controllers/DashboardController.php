<?php

namespace App\Http\Controllers;

use App\Models\Category_Product;
use App\Models\Post;
use App\Models\Posts_category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $category = Category_Product::count();
        $post = Post::count();
        $posts_category = Posts_category::count();
        $Product = Product::count();
        $category_delete = Category_Product::onlyTrashed()->count();
        $post_delete = Post::onlyTrashed()->count();
        $posts_category_delete = Posts_category::onlyTrashed()->count();
        $Product_delete = Product::onlyTrashed()->count();
        return view('dashboard' , compact('category' , 'post' , 'posts_category' ,'Product' ,'category_delete' ,'post_delete', 'posts_category_delete', 'Product_delete'));
    }
}