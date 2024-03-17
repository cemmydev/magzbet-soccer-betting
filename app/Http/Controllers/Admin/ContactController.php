<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index() {
        $contacts=Contact::all()->toArray();
        return view('admin.contacts')->with('content', 'index')->with('data', $contacts);
    }

    public function contact(Request $request, $id) {
        $contact = Contact::find($id)->toArray();
        return view('admin.contacts')->with('content', 'contact')->with('data', $contact);
    }
}
