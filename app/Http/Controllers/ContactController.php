<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function store(Request $request) {
        $request->validate([
            "email" => "email|required",
            "subject" => "required",
            "message" => "required",
        ]);

        Contact::create($request->all());

        return redirect()->route("contact")->with("success","Your Message Sent Successfully");
    }
}
