<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\ComplainBox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplainBoxController extends Controller
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
        $data = [
            "user_id" =>Auth::user()->id,
           "name" => $request->name,
            "user_name" => $request->user_name,
            "subject" => $request->subject,
            "complain" => $request->complain,
        ];

        $complain = ComplainBox::create($data);
        if($complain){
            $msg = "Your complain successfully submitted. Our team take imedieatly action on your complain";
            return response()->json($msg);
        }else{
            $msg = "Opps! Something went wrong! Please try again";
            return response()->json($msg);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User\ComplainBox  $complainBox
     * @return \Illuminate\Http\Response
     */
    public function show(ComplainBox $complainBox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User\ComplainBox  $complainBox
     * @return \Illuminate\Http\Response
     */
    public function edit(ComplainBox $complainBox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User\ComplainBox  $complainBox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComplainBox $complainBox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User\ComplainBox  $complainBox
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComplainBox $complainBox)
    {
        //
    }
}
