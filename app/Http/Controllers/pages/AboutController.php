<?php

namespace App\Http\Controllers\pages;

use Illuminate\Http\Request;
use App\Models\About;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('backend.pages.about_us.index', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);

        // dd($request->all());
        // تحقق من المدخلات
        $request->validate([
            'company_ar' => 'required|string|max:255',
            'company_en' => 'required|string|max:255',
            'who_are_we_ar' => 'required|string',
            'who_are_we_en' => 'required|string',
            'contant_ar' => 'required|string',
            'contant_en' => 'required|string',
            // 'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ], [
            'company_ar.required' => 'اسم الشركة بالعربية مطلوب.',
            'company_en.required' => 'اسم الشركة بالإنجليزية مطلوب.',
            // 'image.image' => 'الملف المرفوع يجب أن يكون صورة.',
        ]);
        // معالجة الصورة
        $data = $request->except(['image']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = uniqid() .$image->getClientOriginalExtension();
            $image->move("about", $image_name);
            $data['image'] = "about/" . $image_name;
        }

        $about->update($data);
        // تحديث البيانات

        // عرض رسالة نجاح
        toastr()->success('Data has been saved successfully!');
        return redirect()->back()->with('success', 'About updated successfully');
    }
}
