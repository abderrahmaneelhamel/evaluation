<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey_question extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function response()
    {
        return $this->hasMany(response::class);
    }
}
