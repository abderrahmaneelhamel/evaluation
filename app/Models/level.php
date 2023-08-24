<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class level extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function classes()
    {
        return $this->hasMany(classes::class);
    }

    public function subject()
    {
        return $this->hasMany(subject::class);
    }

    public function survey()
    {
        return $this->hasMany(survey::class);
    }

    public function branch_id()
    {
        return $this->belongsTo(branch::class ,'id');
    }
}
