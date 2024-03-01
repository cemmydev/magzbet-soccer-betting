<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /*
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(10);
        return view('index', compact('posts'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'odd' => 'required',
            'stake' => 'required',
            'gain' => 'required',
            'profit' => 'required'
        ]);
        
        Post::create($request->post());

        return redirect()->route('posts.index')->with('success','Student has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Student  $student
    * @return \Illuminate\Http\Response
    */
    public function show(Student $student)
    {
        return view('show',compact('student'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Student $student
    * @return \Illuminate\Http\Response
    */
    public function edit(Student $student)
    {
        return view('edit',compact('student'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Student  $student
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);
        
        $student->fill($request->post())->save();

        return redirect()->route('students.index')->with('success','Student Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Student $student
    * @return \Illuminate\Http\Response
    */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success','Student has been deleted successfully');
    }
}
