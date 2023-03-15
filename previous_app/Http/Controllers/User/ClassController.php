<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\Classs;
use App\Models\User\Course;
use App\Models\User\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $my_classes= Cache::remember('my_classes'.$user_id, 22 * 60, function () use($user_id){
            $enroll_courses = User::find($user_id)->enrollCourses;
            $classes = new \stdClass();
            $live_classes = [];
            $upcoming_classes = [];
            $previous_classes = [];
            foreach ($enroll_courses as $enroll_course) {
                $enroll_classes = Course::find($enroll_course->course_id)->classes;
                foreach($enroll_classes as $class){
                    $class->course_title= Course::where('id', $class->course_id)->first('title')->title;
                    $class->subject_title= Subject::where('id', $class->subject_id)->first('title')->title;
                    if($class->starting_time>=date('Y-m-d H:i:s')){
                        array_push($upcoming_classes, $class);
                    }elseif($class->ending_time>date('Y-m-d H:i:s')){
                        array_push($live_classes, $class);
                    }else{
                        array_push($previous_classes, $class);
                    }
                }
            }
            $classes->live_classes= $live_classes;
            $classes->upcoming_classes= $upcoming_classes;
            $classes->previous_classes= $previous_classes;
            return  $classes;
        });

        return response()->json($my_classes);
    }

    public function getClass($id){
        $class = Classs::select('course_id', 'subject_id', 'title', 'banner', 'zoom_link', 'url_link', 'description')->find($id);
        $class->course_title= Course::where('id', $class->course_id)->first('title')->title;
        $class->subject_title= Subject::where('id', $class->subject_id)->first('title')->title;
        
        return response()->json($class);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
