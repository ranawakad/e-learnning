<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\course_user;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    //Teacher Func to get his courses
    public function getCourses()
    {
        $user = auth()->user();
        $usersCourses = $user->courses;
        return view("users.courses", ["data" => $usersCourses]);
    }
    //student Func to get available courses
    public function getAvCourses()
    {
        // $all_courses = Course::all()->toArray();
        // $user = auth()->user();
        // $enroll_courses []= $user->studentCourses;
        // // unset($enroll_courses['pivot']);
        // // print_r($enroll_courses);
        // $availble_courses=array_diff_key($all_courses,$enroll_courses);
        // return view("users.availbleCourses", ["data" => $availble_courses]);

        $userId = auth()->user()->id;
        $courses = DB::table('courses')
            ->select('*')
            ->whereNotExists(function ($query) use ($userId) {
                $query->select(DB::raw(1))
                    ->from('course_user')
                    ->whereRaw('courses.id = course_user.course_id')
                    ->where('course_user.user_id', '=', $userId);
            })->get();
        // dd($courses);
        return view("users.availbleCourses", ["data" => $courses]);
    }

    // public function unEnroll($user_id, $course_id)
    // {
    //     $user = auth()->user();
    //     $enroll_courses = $user->studentCourses;
    //     $course_user = course_user::where('user_id', $user_id)
    //         ->where('course_id', $course_id)
    //         ->get();
    //     $course_user->delete();
    //     return view("users.enrollments", ["data" => $enroll_courses]);
    // }


    public function enrolling($courseID)
    {
        // courses
        $courses = Course::all();
        $userID = Auth::user()->id;
        $student = User::find($userID);
        if (Gate::allows('isStudent')) {
            if (!$student->studentCourses->contains($courseID)) {
                $student->studentCourses()->attach($courseID);
                return back();
            } 
        }

    }
    public function unenrolling($courseID)
    {
        $userID = Auth::user()->id;
        $student = User::find($userID);
        $student->studentCourses()->detach($courseID);
        return back();
    }
    // public function getEnrollments(course_user $course_user){
    //     $user= auth()->user();
    //     $usersCourses = $user->studentCourses;
    //     return view("users.enrollments",["data"=>$usersCourses,"enroll"=>$course_user]);
    //     // var_dump($user->studentCourses);
    //     // return view("users.enrollments");
    // }
}
