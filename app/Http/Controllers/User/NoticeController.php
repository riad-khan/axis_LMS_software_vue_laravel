<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\Course;
use App\Models\User\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $data = Cache::remember('user_notices'.$user_id, 22 * 60, function() use($user_id,$request){

            $courses=[];

            $enroll_courses = User::find($user_id)->enrollCourses;

            $course = [];

            foreach ($enroll_courses as $enroll_course) {
                $course_row= Course::find($enroll_course->course_id);
                $notices = $course_row->notices;
                foreach($notices as $notice){
                    if($request->course_id=='' || $notice->course_id==$request->course_id) {
                        $notice->course_title = Notice::find($notice->id)->course->title;
                        $notice->subject_title = Notice::find($notice->id)->subject->title;
                        array_push($courses, $notice);
                    }
                }
            }
            return  $courses;
        });
        return response()->json($data);
        // $user_notices = Cache::remember('user_notices', 22 * 60, function () {
        //     $enroll_courses = User::find(Auth::user()->id)->enrollCourses;
        //     $notices = [];
        //     foreach($enroll_courses as $enroll_course){
        //         $notice = Course::find($enroll_course->course_id)->notices;
        //         $notices[] =$notice;
        //     }
        //     return  $notices;
        // });

        // return response()->json($user_notices);
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
     * @param  \App\Models\User\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        //
    }
}
