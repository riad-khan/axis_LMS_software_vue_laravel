<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Cache::remember('courses', 22 * 60, function () {
            $courses = Course::where('is_active', 1)->get();

            return $courses;
        });
        return response()->json($courses);
    }
    public function myCourses()
    {
        $user_id = Auth::user()->id;
        $user_courses = Cache::remember('user_courses' . $user_id, 22 * 60, function () use ($user_id) {

            $enroll_courses = User::find($user_id)->enrollCourses;
            $courses = [];
            foreach ($enroll_courses as $enroll_course) {
                $course = Course::select('id', 'title', 'banner')->where('is_active', 1)->where('id', $enroll_course->course_id)->first();
                $course->catagory_title = "physics";
                $course->merit = 11;
                $course->progress = 50;
                array_push($courses, $course);
            }
            return  $courses;
        });
        return response()->json($user_courses);
    }

    public function getCourse()
    {
        $all_courses = Course::select('id', 'title', 'banner', 'description')->where('is_active', 1)->get();
        $courses = [];
        foreach ($all_courses as $course) {
            $course->grade = "9th Geade";
            $course->chapter = "Chapter 11";
            $course->regular_price = 1600;
            $course->offer_price_price = 1500;
            $course->overall_review = 4.5;
            $course->merit = 11;
            $course->progress = 50;
            array_push($courses, $course);
        }
        return response()->json($courses);
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
     * @param  \App\Models\Usre\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usre\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usre\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usre\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
