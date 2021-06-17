<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    CONST FIELD_TITLE = "title";
    CONST FIELD_DATE = "date";
    CONST FIELD_OBJECTIVE = "objective";
    CONST FIELD_DESCRIPTION = "description";

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'meeting_user');
    }
}
