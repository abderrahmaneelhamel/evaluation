<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class action extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function professeur_id()
    {
        return $this->belongsTo(User::class ,'id');
    }

    public function survey_id()
    {
        return $this->belongsTo(survey::class ,'id');
    }

    public function subject_id()
    {
        return $this->belongsTo(subject::class ,'id');
    }

}
