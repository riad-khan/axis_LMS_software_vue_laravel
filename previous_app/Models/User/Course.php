<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Course extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class, 'course_id', 'id');
    }

    public function notices()
    {
        return $this->hasMany(Notice::class, 'course_id', 'id')->select('id', 'title' , 'description', DB::raw('DATE_FORMAT(notices.date, "%D %b %Y") as date'),  DB::raw('TIME_FORMAT(notices.time, "%h:%i %p") as time'), 'button', 'button_text', 'button_url');
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'course_id', 'id')->select('id', 'title', 'banner', DB::raw('DATE_FORMAT(schedules.date, "%W,%d %b") as date'), 'button', 'button_text', 'button_url');
    }
    public function subjects()
    {
        return $this->hasMany(Subject::class, 'course_id', 'id');
    }
    public function classes()
    {
        return $this->hasMany(Classs::class, 'course_id', 'id')->select('id', 'course_id', 'subject_id', 'title', DB::raw('DATE_FORMAT(classses.starting_time, "%D %b %Y") as date'), 'banner', 'url_link');
    }
}
