<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\ClassComment;
use App\Models\User\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ClassCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $class_id = $id;
        $class_comments = Cache::remember('class_comments' . $class_id, 22 * 60, function () use ($class_id) {
            $all_comments = new \stdClass();
            $comments = ClassComment::select('class_id', 'user_id', 'comment', 'updated_at')->where('class_id',  $class_id)->get();
            foreach ($comments as $comment) {
                $comment->comment_time = $this->minuteAgo(strtotime($comment->updated_at)); 
                $comment->user_name = User::where('id', $comment->user_id)->first()->name;
                $comment->user_photo = User::where('id', $comment->user_id)->first()->photo;
            }
            $all_comments->total_comment = count($comments);
            $all_comments->comments = $comments;
            return $all_comments;
        });

        return response()->json($class_comments);
    }
    static function minuteAgo($time)
    {
        // dd($time);

        $time = time() - $time; // to get the time since that moment
        $time = ($time < 1) ? 1 : $time;
        $tokens = array(
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
        }
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
    public function store(Request $request,  $id)
    {
        $comment = new ClassComment();
        $comment->class_id = $id;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->save();

        return response()->json($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User\ClassComment  $classComment
     * @return \Illuminate\Http\Response
     */
    public function show(ClassComment $classComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User\ClassComment  $classComment
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassComment $classComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User\ClassComment  $classComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassComment $classComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User\ClassComment  $classComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassComment $classComment)
    {
        //
    }
}
