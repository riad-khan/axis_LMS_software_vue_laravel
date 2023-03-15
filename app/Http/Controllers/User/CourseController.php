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

            foreach ($courses as $course) {
                $course->catagory_title = "physics";
                array_push($courses, $course);
            }

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

    public function getCourseDetails($course_id)
    {
        $course = Course::select('id', 'title', 'banner', 'description')->where('is_active', 1)->where('id', $course_id)->first();
//        $course->grade = "9th Geade";
//        $course->chapter = "Chapter 11";
        $course->catagory_title = "physics";
        $course->total_students = 200;
        $course->starting_date = '20 April, 2020';
        $course->admission_opening = '10 April, 2020';
        $course->admission_deadline = '15 April, 2020';
        $course->class_time = "Every Saturday & Tuesday";
        $course->course_duration = "6 Months";
        $course->total_videos = 40;
        $course->total_exams = 20;
        $course->total_hours = 99;
        $course->course_credit = 03;
        $course->regular_price=1600;
        $course->offer_price_price=1500;
        $course->overall_review= 4.5;
        $course->course_includes = '44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates';

        $course->features= [
                                [
                                    'title'=> 'All Benefits',
                                    'items'=> [
                                        'Dignissim id a nisl ullamcorper a amet',
                                        'convallis ullamcorper at vitae at nisl massa. Bibendum amet.',
                                        'feugiat morbi nec Pulvinar at egestas vitae ut feugiat morbi nec.',
                                        'Ullamcorper vulputate aliquam'
                                    ]
                                ],

                                [
                                    'title'=> 'All Requirements',
                                    'items'=> [
                                        'Dignissim id a nisl ullamcorper a amet',
                                        'convallis ullamcorper at vitae at nisl massa. Bibendum amet.',
                                        'feugiat morbi nec Pulvinar at egestas vitae ut feugiat morbi nec.',
                                        'Ullamcorper vulputate aliquam'
                                    ]
                                ],

            ];



        $related_courses = [];
        $courses = Course::select('id', 'title')->get();
        foreach ($courses as $item) {

            $course->catagory_title = "physics";
            $course->course_duration = "6 Months";
            $course->total_videos = 40;
            $course->total_exams = 20;
            array_push($related_courses, $item);
        }

        $course->related_courses = $related_courses;
        return response()->json($course);
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
