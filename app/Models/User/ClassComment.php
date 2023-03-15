<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassComment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function classs()
    {
        return $this->belongsTo(Classs::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classResource()
    {
        return $this->belongsTo(Classs::class);
    }
}
