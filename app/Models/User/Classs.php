<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'classses';

    public function classComment()
    {
        return $this->hasMany(ClassComment::class);
    }
    public function classResources()
    {
        return $this->hasMany(ClassResource::class, 'class_id', 'id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function subject()
    {
        return $this->belongsTo(subject::class);
    }
}
