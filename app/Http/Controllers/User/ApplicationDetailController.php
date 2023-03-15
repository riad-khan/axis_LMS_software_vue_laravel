<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\ApplicationDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class ApplicationDetailController extends Controller
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
            //first select position from where to start
            $position = strpos($request->photo, ';');

            //which index to take
            $sub = substr($request->photo, 0, $position);
            //remove slash from image link

            $ext = explode('/', $sub)[1];

            //image naming //

            $name = time() . "." . $ext;

            //image making & resizing with intervention //
            $image = Image::make($request->photo)->resize(240, 200);

            //upload path//
            $upload_path = 'img/user/';
            $image_url = $upload_path . $name;
            $image->save($image_url);

            $data = [
                'user_id' => Auth::user()->id,
                'reg_id' => $request->reg_id,
                'course_name' => $request->course_name,
                'subject' => $request->subject,
                'doctors_name' => $request->doctors_name,
                'bmdc_no' => $request->bmdc_no,
                'medical_college' => $request->medical_college,
                'session' => $request->year,
                'job_description' => $request->job_description,
                'contact_no' => $request->contact_no,
                'fathers_name' => $request->fathers_name,
                'fathers_profession' => $request->fathers_profession,
                'mothers_name' => $request->mothers_name,
                'mothers_profession' => $request->mothers_profession,
                'sopuse_name' => $request->sopuse_name,
                'spouse_profession' => $request->spouse_profession,
                'email' => $request->email,
                'facebook_id' => $request->facebook_id,
                'important_contact' => $request->important_contact,
                'relation' => $request->relation,
                'mailing_address' => $request->mailing_address,
                'institute_name' => $request->institute_name,
                'result_name' => $request->result_name,
                'passing_year' => $request->passing_year,
                'education_board' => $request->education_board,
                'mbbs_institute_name' => $request->mbbs_institute_name,
                'mbbs_result_name' => $request->mbbs_result_name,
                'mbbs_passing_year' => $request->mbbs_passing_year,
                'mbbs_education_board' => $request->mbbs_education_board,
                'fcps_institute_name' => $request->fcps_institute_name,
                'fcps_result_name' => $request->fcps_result_name,
                'fcps_passing_year' => $request->fcps_passing_year,
                'fcps_education_board' => $request->fcps_education_board,
                'hearing_source' => json_encode($request->hearing_source),
                'enrolled_courses' => $request->enrolled_courses,
                'join' => $request->join,
                'photo' => $image_url,
                'is_agree' => $request->is_agree,
            ];




            $application_details = ApplicationDetail::insert($data);

            return response()->json($application_details);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User\ApplicationDetail  $applicationDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ApplicationDetail $applicationDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User\ApplicationDetail  $applicationDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplicationDetail $applicationDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User\ApplicationDetail  $applicationDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApplicationDetail $applicationDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User\ApplicationDetail  $applicationDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplicationDetail $applicationDetail)
    {
        //
    }
}
