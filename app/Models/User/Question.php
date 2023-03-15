<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function options()
    {
        return $this->hasMany(Option::class, 'question_id', 'id')->select('id', 'question_id', 'option_letter', 'option_text', 'explanation')->orderBy('order','ASC');
    }

    public function exam()
    {
        return $this->belongsToMany(Exam::class);
    }

    public function resultDetail()
    {
        return $this->belongsTo(ResultDetail::class);
    }
}
