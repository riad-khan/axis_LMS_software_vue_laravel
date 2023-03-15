<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function notices()
    {
        return $this->hasMany(Notice::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function classes()
    {
        return $this->hasMany(Classs::class, 'subject_id', 'id');
    }
}
