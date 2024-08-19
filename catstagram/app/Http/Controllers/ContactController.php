<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        // $request->validate([
        //     'email' => 'required|email|max:255',
        //     'subject' => 'required|string|max:255',
        //     'message' => 'required|string',
        // ]);

        // Create a new message in the database
        Message::create([
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Je bericht is succesvol verzonden!');
    }
}
