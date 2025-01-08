<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Http\Requests\StoreHeroRequest;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Hero::first();
        return view('backend.pages.hero.index' , compact('hero'));
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
    public function store(StoreHeroRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Hero $hero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hero $hero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // التحقق من وجود السجل في قاعدة البيانات
        $hero = Hero::findOrFail($id);

        // التحقق من صحة البيانات
        $request->validate([
            'title_ar' => 'nullable|string|max:255', // مثال: حقل اسم البطل إذا كان موجودًا
            'title_en' => 'nullable|string|max:255', // مثال: حقل اسم البطل إذا كان موجودًا
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // التحقق من أن الصورة صحيحة
        ]);


        // استبعاد حقول الصورة والفيديو
        $data = $request->except('image');

        // معالجة الصورة إذا تم رفعها
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->move('ImageHero', $imageName);
            $data['image'] = "ImageHero/" . $imageName;
        }

        // تحديث البيانات
        $hero->update($data);
        toastr()->success('تم تعديل المرفقات بنجاح');
        return redirect()->back()->with('success', 'تم تحديث البيانات بنجاح!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hero $hero)
    {
        //
    }
}