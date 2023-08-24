<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class response extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function student_id()
    {
        return $this->belongsTo(User::class ,'id');
    }

    public function survey_question_id()
    {
        return $this->belongsTo(survey_question::class ,'id');
    }

    public function response_note()
    {
        return $this->belongsTo(response_note::class ,'id');
    }
}
