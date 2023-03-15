<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Exam extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function sunject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function questions()
    {
        return $this->hasMany(Question::class, 'exam_id', 'id')->select('id', 'question_text');
    }
    public function result()
    {
        return $this->belongsTo(Result::class);
    }
    public function resultDetails()
    {
        return $this->hasMany(ResultDetail::class, 'exam_id', 'id')
                    ->select('question_id', 'user_id', 'user_ans');
    }
}
