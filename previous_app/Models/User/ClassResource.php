<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassResource extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function classs()
    {
        return $this->belongsTo(Classs::class);
    }
}
