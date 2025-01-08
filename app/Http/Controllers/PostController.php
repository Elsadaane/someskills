<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Posts_category;
use App\Models\PostsCatogry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productes = Post::with('PostsCategory')->get();
        return view('backend.pages.posts.index', compact('productes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Posts_category::all();
        return view('backend.pages.posts.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'posts_category_id' => 'required|exists:posts_categories,id',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content_ar' => 'required|string',
            'content_en' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        $data = $request->except('image');
        // رفع الصورة إذا كانت موجودة
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . $image->getClientOriginalName();
            $image->move("posts", $imageName);
            $imagePath = "posts/" . $imageName;
            $data['image'] = $imagePath;
        } else {
            $imagePath = null;
        }

        // إنشاء البوست الجديد
        $data['slug'] = Str::slug($data['title_en'] , '-');
        Post::create($data);

        // إعادة التوجيه بعد الحفظ
        toastr()->success('posts success successfully');
        return redirect()->route('posts.index')->with('success', __('back.category_created_successfully'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $posts_Catogry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Post::findOrFail($id);
        $categories = Posts_category::all();
        return view('backend.pages.posts.edit', compact('product' , 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $posts = Post::findOrFail($id);
        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'posts_category_id' => 'required|exists:posts_categories,id',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content_ar' => 'required|string',
            'content_en' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $data = $request->except('image');
        // رفع الصورة إذا كانت موجودة
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . $image->getClientOriginalName();
            $image->move("posts", $imageName);
            $imagePath = "posts/" . $imageName;
            $data['image'] = $imagePath;
        } else {
            $imagePath = null;
        }
        // dd($data);
        // إنشاء البوست الجديد
        $data['slug'] = Str::slug($data['title_en']);

        $posts->update($data);

        // إعادة التوجيه بعد الحفظ
        toastr()->success('posts update successfully');
        return redirect()->route('posts.index')->with('success', __('back.category_update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $posts = Post::findOrFail($id);
        $posts->delete();
        toastr()->error('posts deleted successfully');
        return redirect()->route('posts.index')->with('success', 'posts deleted successfully');
    }
}
