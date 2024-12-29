<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact()
    {
        return view('contact-us');
    }
    public function services()
    {
        return view('services');
    }
    public function submitContact(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    // معالجة البيانات أو إرسال البريد
    return back()->with('success', 'Your message has been sent successfully!');
}

}
