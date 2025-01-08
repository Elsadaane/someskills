<?php
namespace App\Http\Controllers\pages;

use Illuminate\Http\Request;
use App\Models\Contact_Us;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    public function index()
    {
        $contact = Contact_Us::first();
        if (!$contact) {
            return redirect()->back()->with('error', 'No contact record found.');
        }

        return view('backend.pages.Contanct_us.index', compact('contact'));
    }

    public function update(Request $request, $id)
    {
    // Validation Rules
    $validated = $request->validate([
        'name_ar' => 'required|string|max:255',
        'name_en' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'subject_ar' => 'required|string|max:255',
        'subject_en' => 'required|string|max:255',
        'message_ar' => 'required|string',
        'message_en' => 'required|string',
    ], [
        // Custom Validation Messages
        'name_ar.required' => __('validation.required', ['attribute' => __('fields.name_ar')]),
        'name_en.required' => __('validation.required', ['attribute' => __('fields.name_en')]),
        'email.required' => __('validation.required', ['attribute' => __('fields.email')]),
        'email.email' => __('validation.email', ['attribute' => __('fields.email')]),
        'phone.required' => __('validation.required', ['attribute' => __('fields.phone')]),
        'subject_ar.required' => __('validation.required', ['attribute' => __('fields.subject_ar')]),
        'subject_en.required' => __('validation.required', ['attribute' => __('fields.subject_en')]),
        'message_ar.required' => __('validation.required', ['attribute' => __('fields.message_ar')]),
        'message_en.required' => __('validation.required', ['attribute' => __('fields.message_en')]),
    ]);

        $contact = Contact_Us::findOrFail($id);
        if (!$contact) {
            return redirect()->back()->with('error', 'Contact record not found.');
        }

        $contact->update([
            'phone' => $request->phone,
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'email'=>$request->email,
            'subject_ar'=>$request->subject_ar,
            'subject_en'=>$request->subject_en,
            'message_ar'=>$request->message_ar,
            'message_en'=>$request->message_en,
        ]);
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('Contact_us.index')->with('success', 'Contact details updated successfully.');
    }
}
