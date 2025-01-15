<?php

namespace App\Http\Controllers;

use App\Models\Category_Product;
use App\Models\Post;
use App\Models\Posts_category;
use App\Models\Tag;
use App\Models\writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Posts_category::all();
        $tags = Tag::all();

        $id = Auth::guard('writer')->user()->id;

            //
        $date = Post::where('writer_id', $id)

            ->where('user_type', 'writer')
            // ->where('status' , 1)
            ->get();
            // dd($data);


        return view('frontend.writers.index', compact('date' ,'categories' ,'tags'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Posts_category::all();
        return view('frontend.writers.create' , compact('categories'));
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
        $data['user_type']=  "writer";
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
        return redirect()->route('writer.index')->with('success', __('back.category_created_successfully'));
    }
    /**
     * Display the specified resource.
     */
    public function show(writer $writer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = writer::findOrFail($id);
        return view('frontend.writers.edit' , compact('data'));
    }
    public function edit_post($id)
    {
        $data = Post::findOrFail($id);
        $categories = Posts_category::all();
        return view('frontend.writers.edit_post' , compact('data' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('image');
        $new = writer::findOrFail($id);
        if($request->hasFile('image')){
            $image = $request->image;
            $newname = uniqid() . $image->getClientOriginalName();
            $image->move("imageWriter" , $newname);
            $path = "imageWriter/" . $newname;
            $data['image'] = $path;
        }
        $new->update($data);
        return redirect()->route('writer.index');

    }
    public function update_post(Request $request, $id)
    {
        $posts = Post::findOrFail($id);
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
        $data['user_type']=  "writer";
        if (Auth::user()) {
            $data['user_id'] = Auth::user()->id;
        } elseif (Auth::guard('writer')->user()) {
            $data['writer_id'] = Auth::guard('writer')->user()->id;
        }

        if ($request->has('tags')) {
            $posts->tags()->sync($request->tags);
        }
        $posts->update($data);


        toastr()->success('posts update successfully');
        return redirect()->route('writer.index')->with('success', __('back.category_update'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete;
        return redirect()->route('writer.index');
    }
    public function login(){
        return view('frontend.writers.login');

    }
    public function register(){
        return view('frontend.writers.register');

    }
   public function write_login(Request $request){
       $request->validate([
           'email' => 'required|string|email',
           'password' => 'required|string|min:8',
        ]);
        $data = $request->only('password' , 'email');
        if(Auth::guard('writer')->attempt($data)){
        return redirect()->route('writer.index');
    }
    return redirect()->route('writer-login-page');
   }




   ////////////////=//////============================================////////////////////////////////
   public function create_writer(Request $request){
    $request->validate([
        'name' => 'required|string|max:255|min:3',
        'email' => 'required|string|email|max:255|unique:writers,email',
        'password' => 'required|string|confirmed|min:8',
    ]);

    $data = $request->except('password', 'image');
    $data['password'] = Hash::make($request->password);

    $writer = Writer::create($data);

    Auth::login($writer);

    return redirect()->route('home'); // استبدل 'home' بمسار الصفحة الرئيسية الخاصة بك
}




//    ============//////////////////////////======////////////////=========

public function posts_writer_detils($id){
    $data = Post::findOrFail($id);
 return view('frontend.writers.post_single_page' , compact('data'));
}



public function WriterPosts($id){
       $writer = Writer::findOrFail($id);

       $data = Post::where('writer_id', $id)->where('user_type', 'writer')->where('status', 1)->get();
       return view('frontend.writers.profile', compact('writer', 'data'));

}



public function logout(){
    Auth::guard('writer')->logout();
    return redirect()->route('home');
}

}