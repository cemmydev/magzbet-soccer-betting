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

    public function edit(Request $request, $id) {
        $text = UDText::find($id);
        return view('admin.texts')->with('index', 'edit')->with('text', $text);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'field' => 'required',
        ]);

        $text = UDText::find($id);
        $text->field = $request->field;
        $text->text = $request->text;
        $text->save();
        return redirect()->route('admin.texts');
    }

    public function create() {
        return view('admin.texts')->with('index', 'create');
    }

    public function store(Request $request) {
        $request->validate([
            'field' => 'required',
        ]);
        
        UDText::create($request->all());

        return redirect() -> route('admin.texts');
    }
}
