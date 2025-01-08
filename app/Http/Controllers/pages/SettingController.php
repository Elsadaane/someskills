<?php

namespace App\Http\Controllers\pages;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('backend.pages.setting.index', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'website_name_ar' => 'required|string',
            'website_name_en' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        $setting = Setting::findOrFail($id);
        if (!$setting) {
            return redirect()->back()->withErrors('Setting not found.');
        }

        $data = [];
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $extension = $logo->getClientOriginalExtension();

            if (!in_array($extension, $allowedExtensions)) {
                return redirect()->back()->withErrors('Invalid file type.');
            }

            $logo_name = uniqid() . '_' . $logo->getClientOriginalName();
            if ($logo->move(public_path('setting/logo/'), $logo_name)) {
                $data['logo'] = 'setting/logo/' . $logo_name;
            } else {
                return redirect()->back()->withErrors('Failed to upload the logo.');
            }
        }

        $updateData = [
            'website_name_ar'=> $request->website_name_ar, // you can remove this if you don't have
            'website_name_en'=> $request->website_name_en, // you can remove this if you don't have
            'email' => $request->email,
            'phone' => $request->phone,
        ];

        if (isset($data['logo'])) {
            $updateData['logo'] = $data['logo'];
        }

        $setting->update($updateData);
        toastr()->success('Data has been saved successfully!');

        return redirect()->back();
    }
}