<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Posts_category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Foreach_;

class PostController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productes = Post::with('PostsCategory' , 'writer' , 'tags')->get();
        $categories = Posts_category::all();
        $tags = Tag::all();

        return view('backend.pages.posts.index', compact('productes' , 'categories' , 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Posts_category::all();
        $tags = Tag::all();
        return view('backend.pages.posts.create' , compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'posts_category_id' => 'required|exists:posts_categories,id',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content_ar' => 'required|string',
            'content_en' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        $data = $request->except('image' , 'tags');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . $image->getClientOriginalName();
            $image->move("posts", $imageName);
            $imagePath = "posts/" . $imageName;
            $data['image'] = $imagePath;
        } else {
            $imagePath = null;
        }

        $data['slug'] = Str::slug($data['title_en'] , '-');
        $data['user_type']=  "admin";
        if (Auth::user()) {
            $data['user_id'] = Auth::user()->id;
        } elseif (Auth::guard('writer')->user()) {
            $data['writer_id'] = Auth::guard('writer')->user()->id;
        }
       $post =  Post::create($data);

        //     if ($request->has('tags')) {
        //         $tags = collect($request->tags)->map(function ($tag) {
        //     return Tag::firstOrCreate(['name' => $tag])->id;
        // });
        // $post->tags()->sync($tags);
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }


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
    public function update(Request $request)
    {
        $posts = Post::findOrFail($request->id);
        $request->validate([
            'posts_category_id' => 'required|exists:posts_categories,id',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content_ar' => 'required|string',
            'content_en' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $data = $request->except('image' , 'tags');

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
        $data['slug'] = Str::slug($data['title_en']);
        if (Auth::user()) {
            $data['user_id'] = Auth::user()->id;
        } elseif (Auth::guard('writer')->user()) {
            $data['writer_id'] = Auth::guard('writer')->user()->id;
        }
        $posts->update($data);
        // if ($request->has('tags')) {
        //     $tags = collect($request->tags)->map(function ($tag) {
        //         return Tag::firstOrCreate(['name' => $tag])->id;
        //     });
        //     $posts->tags()->sync($tags);
        // }
        if ($request->has('tags')) {
            $posts->tags()->sync($request->tags);
        }


        toastr()->success('posts update successfully');
        return redirect()->route('posts.index')->with('success', __('back.category_update'));
    }


    public function hashtag(){
        return view('backend.pages.hashtag');
    }

    public function add_hashtag(Request $request){
        $List_Classes = $request->List_Classes;
        foreach($List_Classes as $List_Class){
            $hash  = new Tag();
            $name = $List_Class['name'];
            $hash->name = '#' . Str::replace(' ', '_', trim($name));
            $hash->save();
        }



            return redirect()->back();
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $posts = Post::findOrFail($request->id);
        $posts->delete();
        toastr()->error('posts deleted successfully');
        return redirect()->route('posts.index')->with('success', 'posts deleted successfully');
    }
}