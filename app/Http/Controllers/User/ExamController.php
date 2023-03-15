<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\Course;
use App\Models\User\Question;
use App\Models\User\Exam;
use App\Models\User\QuestionAns;
use App\Models\User\Result;
use App\Models\User\ResultDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $my_exams = Cache::remember('my_exams' . $user_id . $user_id, 22 * 60, function () use ($user_id,$request) {
            $enroll_courses = User::find($user_id)->enrollCourses;
            $exams = new \stdClass();
            $live_exams = [];
            $upcoming_exams = [];
            $previous_exams = [];
            foreach ($enroll_courses as $enroll_course) {
                $enrolled_exams = Course::find($enroll_course->course_id)->exams;
                foreach ($enrolled_exams as $exam) {

                    if($request->course_id=='' || $exam->course_id==$request->course_id) {
                        $exam->total_mark = ($exam->total_question) * ($exam->marks_per_question);
                        if ($exam->starting_time >= date('Y-m-d H:i:s')) {
                            array_push($upcoming_exams, $exam);
                        } elseif ($exam->ending_time > date('Y-m-d H:i:s')) {
                            array_push($live_exams, $exam);
                        } else {
                            array_push($previous_exams, $exam);
                        }
                    }
                }
            }
            $exams->live_exams = $live_exams;
            $exams->upcoming_exams = $upcoming_exams;
            $exams->previous_exams = $previous_exams;
            return  $exams;
        });

        return response()->json($my_exams);
    }

    public function getExamQuestions($id)
    {
        $msg = 'Somethings went wrong!';
        $exam_row = Exam::find($id);
        $data = Cache::remember('user_exam_questions' . $exam_row->id . $id, 22 * 60, function () use ($exam_row) {
            if ($exam_row) {
                $exam['title'] = $exam_row->title;
                $exam['total_questions'] = $exam_row->total_question;
                $exam['total_marks'] = ($exam_row->total_question) * ($exam_row->marks_per_question);
                $exam['duration'] = $exam_row->duration;
                $exam_questions = $exam_row->questions;
                $questions = [];

                foreach ($exam_questions as $question) {
                    $question->options = Question::find($question->id)->options;

                    array_push($questions, $question);
                }
                $exam['questions'] = $questions;
                return $exam;
            } else {
                $msg = 'Somethings went wrong!';
            }
        });
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json($msg);
        }
    }

    public function submitIndividualQuestionAns(Request $request, $question_id)
    {
        $question_ans = new ResultDetail();
        $question_ans->exam_id = $request->exam_id;
        $question_ans->user_id = Auth::user()->id;
        $question_ans->question_id = $question_id;
        $question_ans->user_ans = $request->user_ans;
        $question_ans->save();

        return response()->json($question_ans);
    }
    public function submitExam(Request $request, $exam_id)
    {
        // $user_ans_array = Exam::find($exam_id)->resultDetails->where('user_id', Auth::user()->id);
        $user_ans_array = $request->user_answers;
        // return $user_ans_array;
        $result_array = Question::select('id', 'correct_ans','question_type')->get();
        $result_details = $this->calculateResult($user_ans_array, $result_array);
        $exam = Exam::find($exam_id);
        $result = Result::updateOrCreate(
            [
                "user_id" => Auth::user()->id,
                "exam_id" => $exam_id
            ],
            [
                "total_question" => count($user_ans_array),
                "total_correct" => $result_details->correct,
                "total_wrong" => $result_details->wrong,
                "not_answer" => $result_details->not_ans,
                "total_gain_marks" => (($exam->marks_per_question) * ($result_details->correct)) - (($exam->negative_marks) * ($result_details->wrong)),
            ]
        );
        $result->total_marks = ($exam->marks_per_question) * ($exam->total_question);
        return response()->json($result);


        $user_ans_array = Exam::find($exam_id)->resultDetails->where('user_id', Auth::user()->id);
        // $user_ans_array = $request->user_answers;
        // dd($user_ans_array);
        $ans_rows = [];
        foreach ($user_ans_array as $ans) {
            $item = [
                'user_id' => Auth::user()->id,
                'exam_id' => $exam_id,
                'question_id' => $ans->question_id,
                'user_ans' => $ans->user_ans,
            ];
            array_push($ans_rows, $item);
        }
        ResultDetail::create($ans_rows);
        $result_array = Question::select('id', 'correct_ans','question_type')->get();
        // $result_array = Question::select('question_id', 'correct_ans', 'question_type')->get();
        $result_details = $this->calculateResult($user_ans_array, $result_array);
        $exam = Exam::find($exam_id);
        $data = [
            "user_id" => Auth::user()->id,
            "exam_id" => $exam_id,
            "total_question" => count($user_ans_array),
            "total_correct" => $result_details->correct,
            "total_wrong" => $result_details->wrong,
            "not_answer" => $result_details->not_ans,
            "total_gain_marks" => (($exam->marks_per_question) * ($result_details->correct)) - (($exam->negative_marks) * ($result_details->wrong)),
        ];

        $user_result = Result::updateOrCreate($data);

        return response()->json($user_result);
    }

    public function getResult($exam_id)
    {
        $exam_results = Cache::remember('exam_results' . $exam_id, 22 * 60, function () use ($exam_id) {
            $result = Result::where('exam_id',  $exam_id)->get();
            return $result;
        });

        return response()->json($exam_results);
    }

    static function calculateResult($user_ans_array, $result_array)
    {

//        dd($user_ans_array[0]);

        $correct = 0;
        $wrong = 0;
        $not_ans = 0;
        for ($i = 0; $i < count($user_ans_array); $i++) {

            foreach ($result_array as $result) {

                if ($result->id == $user_ans_array[$i]['question_id']) {

                    if ($result->question_type == "multiple") {

//                dd($result->correct_ans);
                        $correct_ans=json_decode($result->correct_ans);

//                        dd($correct_ans);

                        for ($j = 0; $j < count($correct_ans); $j++) {

                            if ($correct_ans[$j] == $user_ans_array[$i]['user_ans'][$j]) {
                                $correct++;
                            } elseif ($user_ans_array[$i]['user_ans'][$j] == null) {
                                $not_ans++;
                            } else {
                                $wrong++;
                            }
                        }
                    } else {
                        if ($correct_ans == $user_ans_array[$i]['user_ans']) {
                            $correct++;
                        } elseif ($user_ans_array[$i]['user_ans'] == null) {
                            $not_ans++;
                        } else {
                            $wrong++;
                        }
                    }
                }
            }
        }
        $data = new \stdClass();
        $data->correct = $correct;
        $data->wrong = $wrong;
        $data->not_ans = $not_ans;

        return $data;
    }
    static function calculateMultipleAnsResult($user_ans_array, $result_array)
    {
        $correct = 0;
        $wrong = 0;
        $not_ans = 0;
        foreach ($user_ans_array as $item) {
            foreach ($result_array as $result) {
                if ($result->question_id == $item->question_id) {
                    for ($i = 0; $i < count($result->correct_ans); $i++) {
                        if ($result->correct_ans[$i] == $item->user_ans[$i]) {
                            $correct++;
                        } elseif ($item->user_ans[$i] == null) {
                            $not_ans++;
                        } else {
                            $wrong++;
                        }
                    }
                    break;
                }
            }
        }
        $data = new \stdClass();
        $data->correct = $correct;
        $data->wrong = $wrong;
        $data->not_ans = $not_ans;

        return $data;
    }

    public function storeResult(Request $request, $exam_id)
    {
        $user_ans_array = Exam::find($exam_id)->resultDetails->where('user_id', Auth::user()->id);
        $result_array = Question::select('id', 'correct_ans','question_type')->get();
        $result_details = $this->calculateResult($user_ans_array, $result_array);
        $exam = Exam::find($exam_id);
        $result = Result::updateOrCreate(
            [
                "user_id" => Auth::user()->id,
                "exam_id" => $exam_id
            ],
            [
                "total_question" => count($user_ans_array),
                "total_correct" => $result_details->correct,
                "total_wrong" => $result_details->wrong,
                "not_answer" => $result_details->not_ans,
                "total_gain_marks" => (($exam->marks_per_question) * ($result_details->correct)) - (($exam->negative_marks) * ($result_details->wrong)),
            ]
        );

        return response()->json($result);
    }

    public function getResultWithCorrectAns($exam_id)
    {
        $result_details = Result::where('exam_id', $exam_id)->where('user_id', Auth::user()->id)->first();
        $result_details->title = $result_details->exam->title;
        $all_questions = $result_details->exam->questions;
        $questions = [];
        foreach ($all_questions as $item) {
            $options = Question::find($item->id)->options;
            $question_ans = Question::select('id', 'correct_ans','question_type', 'explanation')->where('id', $item->id)->first();
            $user_ans = ResultDetail::where('user_id', Auth::user()->id)->where('question_id', $item->id)->where('exam_id', $exam_id)->first();
            $item->options = $options;
            $item->correct_ans = $question_ans->correct_ans;
            $item->user_ans = $user_ans;
            array_push($questions, $item);
        }
        $result_details->questions = $questions;
        return response()->json($result_details);
    }

    public function upcomingExam()
    {
        $user_id = Auth::user()->id;

        $my_exams = Cache::remember('my_exams' . $user_id, 22 * 60, function () use ($user_id) {
            $enroll_courses = User::find($user_id)->enrollCourses;
            $exams = new \stdClass();
            $upcoming_exams = [];
            foreach ($enroll_courses as $enroll_course) {
                $enrolled_exams = Course::find($enroll_course->course_id)->exams;
                foreach ($enrolled_exams as $exam) {
                    $exam->total_mark = ($exam->total_question) * ($exam->marks_per_question);
                    if ($exam->starting_time >= date('Y-m-d H:i:s')) {
                        array_push($upcoming_exams, $exam);
                    }
                }
            }
            $exams->upcoming_exams = $upcoming_exams;
            return  $exams;
        });

        return response()->json($my_exams);
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
     * @param  \App\Models\Usre\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usre\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usre\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usre\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
