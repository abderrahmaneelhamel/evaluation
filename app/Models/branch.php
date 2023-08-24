<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function faculty_id()
    {
        return $this->belongsTo(faculty::class ,'id');
    }

    public function level()
    {
        return $this->hasMany(level::class);
    }
}
