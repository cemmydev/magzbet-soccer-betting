<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

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

        Toastr::success("Your contact message sent successfully :)", "Success!");

        return redirect()->route("contact")->with("success","Your Message Sent Successfully");
    }
}
