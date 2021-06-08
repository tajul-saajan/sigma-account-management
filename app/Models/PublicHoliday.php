<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicHoliday extends Model
{
    use HasFactory;

    CONST FIELD_DATE="date";
    CONST FIELD_DESCRIPTION="description";

    protected $guarded = ['created_at', 'updated_at'];
}
