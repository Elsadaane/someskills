<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category_Product;
use App\Models\Hero;
use App\Models\Post;
use App\Models\Posts_category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function Category(){

        $postsCategory = Posts_category::with('posts')->paginate(3);
        $recentPosts = Posts_category::orderBy('id', 'desc')->take(5)->get();

        return view('frontend.pages.category' , compact('postsCategory' , 'recentPosts'));
        // make varibel small-litter
    }
    public function Category_details(){
        $posts = Post::with('PostsCategory')->get();
        return view('frontend.pages.CategoryPosts' , compact('posts'));
        // paginate here
    }
    public function home(){
        $about = About::first();
        $hero = Hero::first();
        $PostsCategory = Posts_category::with('posts')->paginate(3);
        return view('frontend.pages.home'  , compact('PostsCategory' , 'about' , 'hero'));
    }
    // public function allPostsBelongCategory($id){
    //     $posts = Post::where('posts_category_id' , $id)->get();
    //     return view('frontend.pages.allPostsBelongCategory' , compact('posts'));
    // }
    // or///////////////////////

    //make comment bettwen function
    public function allPostsBelongCategory($slug) {
        $category = Posts_category::where('slug_category', $slug)->firstOrFail();

        $posts = Post::with('PostsCategory')->where('posts_category_id', $category->id)->paginate(5);

        return view('frontend.pages.allPostsBelongCategory', compact('posts'));
    }
    public function posts(){
        $posts = Post::with('writer')->paginate(5);
        $categories = Category_Product::get();
        $recentPosts =Category_Product::orderBy('id' , 'asc');
        return view('frontend.pages.allPosts' , compact('posts' , 'categories' , 'recentPosts'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query'); // Get search query from input

        // Search the database (adjust fields as needed)
        $PostsCategory  = Posts_category::where('name_category_ar', 'LIKE', "%{$query}%")
            ->orWhere('name_category_en', 'LIKE', "%{$query}%")
            ->orWhere('description_category_en', 'LIKE', "%{$query}%")
            ->orWhere('description_category_ar', 'LIKE', "%{$query}%")
            ->paginate(5);

        return view('frontend.pages.search-results', compact('PostsCategory', 'query'));

    }

   public function product(){
    $products = Product::with('category')->paginate(5);
    $whatsapp_number = '+96897091987';
    $categories = Category_Product::all();
    $recentProducts = Category_Product::orderBy('id' , 'desc');
    return view('frontend.pages.allproduct', compact('products', 'whatsapp_number' , 'categories' ,'recentProducts'));
   }
   public function product_Category(){
    $Category_Product = Category_Product::with('products')->paginate(3);
    $RecentProduct = Category_Product::orderBy('id', 'desc')->take(5)->get();
    // make order by $id to get fast


    return view('frontend.pages.categoryproduct' , compact('Category_Product' , 'RecentProduct'));

   }
   public function categoryDetails($slug){

    $category = Category_Product::where('slug' , $slug)->firstOrFail();
    $products = Product::with('category')->where('category_product_id' , $category->id)->paginate(5);
    $recentProducts = Product::orderBy('id' , 'desc')->take(5)->get();

    return view('frontend.pages.allPruductBelongtoCategory' , compact('products' , 'recentProducts'));

   }
   public function search_category(){

   }
   public function products_byCategory($slug){

   }



}


// {{-- // design product same Category  --}}
// {{-- nav button  --}}