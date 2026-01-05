<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
   
    public function index()
    {
        return view('frontend.contact.index');
    }

public function submit(Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:2000',
    ]);

    // Optionally: send email or save to DB

    return redirect()->route('frontend.contact')->with('success', 'Your message has been sent!');
}

}
