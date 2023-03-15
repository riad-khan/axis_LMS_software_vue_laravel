<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\Exam;
use App\Models\User\Question;
use App\Models\User\Result;
use App\Models\User\ResultDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_result = Cache::remember('all_result', 22 * 60, function () {
            $all_results = Result::where('user_id', Auth::user()->id)->get();
            $results = [];
            foreach($all_results as $result){
                $exam = Exam::where('id',$result->exam_id)->first();
                $result->exam_title = $exam->title;
                $result->total_mark = ($exam->total_question)*($exam->marks_per_question);
                array_push($results, $result);
            }

            return $results;
        });
        return response()->json($all_result);
    }

    public function getExamOverAllResult($exam_id){
        $result_details = Result::where('exam_id',$exam_id)->where('user_id', Auth::user()->id)->first();
        $result_details->title = $result_details->exam->title;
        $result_details->exam_date = date('M d, Y', strtotime($result_details->exam->starting_time));
        $result_details->total_participants = count(Result::where('exam_id', $exam_id)->get());
        $result_details->passed_participants = 8;
        $result_details->total_merit = 8;
        $result_details->total_failed = 2;
        $all_questions = $result_details->exam->questions;
        $questions = [];
        foreach ($all_questions as $item) {
            $options = Question::find($item->id)->options;
            $question_ans = Question::select('id', 'correct_ans', 'explanation')->where('id', $item->id)->first();
            $user_ans = ResultDetail::where('user_id', Auth::user()->id)->where('question_id', $item->id)->where('exam_id', $exam_id)->first();
            $item->options = $options;
            $item->correct_ans = $question_ans->correct_ans;
            $item->user_ans = $user_ans;
            array_push($questions, $item);
        }
        
        $results = Result::where('exam_id',$exam_id)->get();
        $all_results = [];
        foreach($results as $result){
            $result->user_name = User::where('id', $result->user_id)->first()->name;
            $result->exam_name = Exam::where('id', $result->exam_id)->first()->title;
            array_push($all_results, $result);
        }
        $result_details->all_results = $all_results;
        $result_details->questions = $questions;
        return response()->json($result_details);
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
     * @param  \App\Models\User\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
