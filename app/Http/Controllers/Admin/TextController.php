<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UDText;
use Illuminate\Http\Request;

class TextController extends Controller
{
    //
    public function index() {
        $texts = UDText::all();
        return view('admin.texts')->with('index', 'index')->with('texts', $texts);
    }
}
