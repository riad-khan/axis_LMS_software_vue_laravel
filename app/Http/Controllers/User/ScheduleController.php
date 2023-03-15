<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\Course;
use App\Models\User\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $data = Cache::remember('user_schedules'.$user_id, 22 * 60, function() use($user_id,$request){

            $courses=[];

            $enroll_courses = User::find($user_id)->enrollCourses;

            $course = [];

            foreach ($enroll_courses as $enroll_course){

                if($request->course_id=='' || $enroll_course->course_id==$request->course_id) {

                    $course_row = Course::find($enroll_course->course_id);
                    $course['course_title'] = $course_row->title;
                    $schedules = $course_row->schedules;
                    foreach ($schedules as $schedule) {
                        $schedule->course_title = Schedule::find($schedule->id)->course->title;
                        $schedule->subject_title = Schedule::find($schedule->id)->subject->title;
                    }
                    $course['schedules'] = $schedules;

                    array_push($courses, $course);
                }
            }
            return  $courses;
        });
        return response()->json($data);
    }
    // public function index()
    // {
    //     $user_schedules = Cache::remember('user_schedules', 22 * 60, function () {
    //         $enroll_courses = User::find(Auth::user()->id)->enrollCourses;
    //         $schedules = [];
    //         foreach ($enroll_courses as $enroll_course) {
    //             $schedule = Course::find($enroll_course->course_id)->schedules;
    //             $schedules[] = $schedule;
    //         }
    //         return  $schedules;
    //     });

    //     return response()->json($user_schedules);
    // }

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
     * @param  \App\Models\User\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
