<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Brian2694\Toastr\Facades\Toastr;

class TestimonialController extends Controller
{
    //
    public function index() {
        $feedback = Testimonial::where('type', 'feedback')->get()->toArray();
        $youtube = Testimonial::where('type', 'youtube')->get()->toArray();
        return view('admin.testimonial')->with('content', 'index')->with(['feedback' => $feedback, 'youtube' => $youtube]);
    }

    public function create() {
        return view('admin.testimonial')->with('content', 'create');
    }

    public function store(Request $request) {
        $request->validate([
            'type' => 'required'
        ],[
            'type.required' => 'Testimonial type is required!'
        ]);

        Testimonial::create($request);

        return redirect()->route('admin.testimonial');
    }

    public function edit($id) {
        $testimonial = Testimonial::find($id)->toArray();
        return view('admin.testimonial')->with('content', 'edit')->with('testimonial', $testimonial);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'type' => 'required'
        ],[
            'type.required' => 'Testimonial type is required!'
        ]);

        Testimonial::find($id)->update($request);
        return redirect()->route('admin.testimonial');
    }
}
