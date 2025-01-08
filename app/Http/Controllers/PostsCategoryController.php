<?php

namespace App\Http\Controllers;

use App\Models\Posts_category;
use App\Http\Requests\StorePosts_categoryRequest;
use App\Http\Requests\UpdatePosts_categoryRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Posts_category::with('posts')->get();
        // dd($catogry);
        return view('backend.pages.category.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_category_ar' => 'required',
            'name_category_en' => 'required',
            'description_category_ar' => 'required',
            'description_category_en' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->except('image');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move('category/', $image_name);
            $data['image'] ="category/". $image_name;
        }
        $data['slug_category'] = Str::slug($request->name_category_en, '-');

        Posts_category::create($data);
        toastr()->success('category created successfully');
        return redirect()->route('category.index')->with('success', 'category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts_category $catogry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Posts_category::findOrFail($id);
        return view('backend.pages.category.edit' , compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // تحقق من صحة البيانات
        $request->validate([
            'name_category_ar' => 'required',
            'name_category_en' => 'required',
            'description_category_ar' => 'required',
            'description_category_en' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // جلب السجل المطلوب تحديثه
        $category = Posts_category::findOrFail($id);

        $data = [];

        // تحقق من وجود صورة جديدة
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('category/'), $image_name);
            $data['image'] = "category/" . $image_name;

            // حذف الصورة القديمة إذا كانت موجودة
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }
        } else {
            $data['image'] = $category->image; // احتفظ بالصورة القديمة إذا لم يتم رفع صورة جديدة
        }

        // تحديث السجل
        $category->update([
            'name_category_ar'=>$request->name_category_ar,
            'name_category_en'=>$request->name_category_en,
            'image'=>$data['image'],
            'description_category_ar'=>$request->description_category_ar,
            'description_category_en'=>$request->description_category_en,
            'slug_category' => Str::slug($request->name_category_en, '-')

        ]);

        // رسالة النجاح
        toastr()->success('Category updated successfully');
        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts_category $catogry , $id)
    {
        Posts_category::findOrFail($id)->delete();
        toastr()->error('category deleted successfully');
        return redirect()->route('category.index')->with('success', 'category deleted successfully');
    }
    public function allproduct($id){
        // $catogry = Catogry::with('Posts_catogry')->findOrFail($id);
        $posts_category = Post::with('PostsCategory')->where('posts_category_id' , $id)->get();
        return view('backend.pages.category.AllProductCategory' , compact('posts_category'));
    }}