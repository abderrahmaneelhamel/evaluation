<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function action()
    {
        return $this->hasMany(action::class);
    }

    public function professeur_id()
    {
        return $this->belongsTo(User::class ,'id');
    }

    public function level_id()
    {
        return $this->belongsTo(level::class ,'id');
    }

    public function semester_id()
    {
        return $this->belongsTo(semester::class ,'id');
    }
}
