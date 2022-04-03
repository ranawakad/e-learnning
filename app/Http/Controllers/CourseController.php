<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows("isTeacher")) {
            return redirect("/coursesuser");
        }
        elseif(Gate::allows("isStudent")){
           $courses = Course::all();
           return view("courses.index", ["data" => $courses]);
        }
        else{
            return redirect("/login");
        }
        // elseif(!auth()){
        //     return view("/home");
        // }

        // //get all data from Model
        // $courses = Course::all();
        // //send data to index View
        // return view("courses.index", ["data" => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows("isTeacher")) {
            return view("courses.create");
        }else{
            return redirect("/courses");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name'=>"required",
            'description'=>'required',
            'duration'=>'required',
            'img'=>'required'
        ]);

        //the Model will create all from req
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Course::create($input);
        return redirect("/coursesuser");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view("courses.show", ["data" => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view("courses.edit", ["data" => $course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //validation
        $request->validate([
            'name'=>"required",
            'description'=>'required',
            'duration'=>'required',
            'img'=>'required'
        ]);
        
        $user = Auth::user();
        if($user->can("update",$course)){
            $course->update($request->all());
            return redirect("/coursesuser");
        }else{
            return redirect("/coursesuser");
        }
        // $course->update($request->all());
        // return redirect("/coursesuser");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $user = Auth::user();
        if($user->can("delete",$course)){
            $course->delete();
           return redirect("/coursesuser");
        }else{
            return redirect("/coursesuser");
        }
    }

}
