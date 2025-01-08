<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function about()
{
    $About = About::first(); // افترضنا وجود موديل اسمه AboutModel
    return view('frontend.pages.about', compact('About'));
}
public function showContactForm()
{
    return view('frontend.pages.contact_us');
}

public function submitContactForm(Request $request)
{
    // Validating the input data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'nullable|string',
        'subject' => 'required|string',
        'message' => 'required|string|max:500',
    ]);

    // Logic to handle the contact form (e.g., saving to database or sending an email)
    // For demonstration, redirect with success message
    return redirect()->back()->with('success', __('back.Message sent successfully!'));
}

}