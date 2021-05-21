<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubProject extends Model
{
    use HasFactory;

    CONST FIELD_NAME = "name";
    CONST FIELD_DESCRIPTION = "description";
    CONST FIELD_PROJECT = "main_project";

    protected $guarded=[];
}
