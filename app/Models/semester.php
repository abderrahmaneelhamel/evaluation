<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class semester extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subject()
    {
        return $this->hasMany(subject::class);
    }

    public function survey()
    {
        return $this->hasMany(survey::class);
    }
}
