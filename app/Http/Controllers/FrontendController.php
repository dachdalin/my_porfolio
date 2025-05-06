<?php

namespace App\Http\Controllers;

use App\Models\Experiense;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $data['experience'] = Experiense::all();
        $data['education'] = \App\Models\Education::all();
        $data['technologies'] = \App\Models\Technology::all();
        $data['projects'] = \App\Models\Project::all();
        return view('index', $data);
    }
    public function contactUs(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Here you can handle the contact form submission, e.g., send an email or save to the database
        // send an email
        // \Mail::to('dachdalin2@gmail.com')->send(new \App\Mail\ContactFormMail($validated));

        return response()->json(['success' => true, 'message' => 'Message sent successfully.']);
    }
}
