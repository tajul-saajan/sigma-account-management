<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyForLeave extends Model
{
    use HasFactory;

    CONST FIELD_LEAVE_TYPE = "leave_type";
    CONST FIELD_FROM_DATE = "from_date";
    CONST FIELD_TO_DATE = "to_date";
    CONST FIELD_NO_OF_DAYS = "no_of_days";
    CONST FIELD_DOA = "delegation_of_authority";
    CONST FIELD_DEPENDENCY = "dependency";
    CONST FIELD_ENDORSED = "endorsed";
    CONST FIELD_ENDORSED_BY = "endorsed_by";
    CONST FIELD_APPROVED = "approved";
    CONST FIELD_APPROVED_BY = "approved_by";

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
