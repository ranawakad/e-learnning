<?php

namespace App\Http\Controllers;

use App\Models\course_user;
use Illuminate\Http\Request;
use App\Models\Course;

class Course_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Student func to get enrollments
    public function index()
    {
        $user= auth()->user();
        $course_user = course_user::where('user_id', $user->id)->get();
        $usersCourses = $user->studentCourses;
        return view("student.index", ["data2" => $course_user,"data"=>$usersCourses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\course_user  $course_user
     * @return \Illuminate\Http\Response
     */
    public function show(course_user $course_user)
    {
        // $user= auth()->user();
        // $usersCourses = $user->studentCourses;
        // return view("users.enrollments",["data"=>$usersCourses);  

        // return view("articles.show", ["data" => $course_user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\course_user  $course_user
     * @return \Illuminate\Http\Response
     */
    public function edit(course_user $course_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\course_user  $course_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, course_user $course_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\course_user  $course_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(course_user $course_user)
    {
        $course_user =course_user::findorfail($course_user);
        $course_user-> delete();
        // $course_user['id']->delete();
        return redirect(back());
    }

    

    // public function getEnrollments(course_user $course_user){
    //     $user= auth()->user();
    //     $usersCourses = $user->studentCourses;
    //     return view("users.enrollments",["data"=>$usersCourses]);
    //     // var_dump($user->studentCourses);
    //     // return view("users.enrollments");
    // }

    // public function deleteEnrollments(course_user $course_user){
    //     $course_user->delete();
    //     $user= auth()->user();
    //     $usersCourses = $user->studentCourses;
    //     return view("users.enrollments",["data"=>$usersCourses]);
    //     // var_dump($user->studentCourses);
    //     // return view("users.enrollments");
    // }
}
