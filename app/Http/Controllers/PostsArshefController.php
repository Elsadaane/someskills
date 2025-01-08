<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
class PostsArshefController extends Controller
{
    public function index()
    {
        $posts = Post::with('PostsCategory')->onlyTrashed()->get();
        return view('backend.pages.posts.arshef',compact('posts'));
    }
    public function update($id)
    {
        $post = Post::withTrashed()->where('id', $id)->restore();
        if ($post) {
            session()->flash('success', 'تم استرجاع المقال بنجاح');
            toastr()->success('تم استرجاع المقال بنجاح');
            return redirect()->route('posts.index');
        }

    }
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        if ($post->trashed()) {
            $post->forceDelete();
            session()->flash('success', 'تم حذف المقال نهائيا');
            toastr()->success('تم حذف المقال نهائيا');
            return redirect()->route('posts.index');
        } else {
            $post->delete();
            session()->flash('success', 'تم نقل المقال الى الارشيف');
            toastr()->success('تم نقل المقال الى الارشيف');
            return redirect()->route('posts.index');
        }
    }
}
