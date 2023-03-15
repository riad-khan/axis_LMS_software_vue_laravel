<?php

namespace App\Models;

use App\Models\User\ApplicationDetail;
use App\Models\User\ClassComment;
use App\Models\User\ComplainBox;
use App\Models\User\Course;
use App\Models\User\EnrollCourse;
use App\Models\User\Result;
use App\Models\User\ResultDetail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function classComments()
    {
        return $this->belongsToMany(ClassComment::class);
    }

    public function compalins()
    {
        return $this->hasMany(ComplainBox::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function results()
    {
        return $this->hasMany(Result::class);
    }
    public function resultDetails()
    {
        return $this->hasMany(ResultDetail::class, 'user_id', 'id');
    }
    public function enrollCourses()
    {
        return $this-> hasMany(EnrollCourse::class, 'user_id', 'id');
    }

    public function applicationDetails()
    {
        $this->hasOne(ApplicationDetail::class);
    }
}
