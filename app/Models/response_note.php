<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class response_note extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function response()
    {
        return $this->hasMany(response::class);
    }
}
