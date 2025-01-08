<?php

namespace App\Http\Controllers;
use App\Models\Catogry;
use App\Models\Posts_category;
use Illuminate\Http\Request;

class CatogryArshefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catogrys = Posts_category::onlyTrashed()->get();
        return view('backend.pages.category.arshef',compact('catogrys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
    $catogry = Posts_category::withTrashed()->where('id', $id)->restore();

    if ($catogry) {
        session()->flash('success', 'تم استرجاع الكاتيجوري بنجاح');
        toastr()->success('تم استرجاع الكاتيجوري بنجاح');
    } else {
        toastr()->error('لم يتم العثور على الكاتيجوري أو فشل الاسترجاع');
        session()->flash('error', 'لم يتم العثور على الكاتيجوري أو فشل الاسترجاع');
    }

    return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $catogry = Posts_category::withTrashed()->where('id', $id)->first();

        if (!$catogry) {
            return redirect()->route('category.index')->with('error', 'التصنيف غير موجود أو تم حذفه بالفعل');
        }

        $catogry->forceDelete();

        return redirect()->route('category.index')->with('success', 'تم حذف التصنيف نهائيًا بنجاح');
    }

}