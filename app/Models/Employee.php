<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    CONST FIELD_NAME = "name";
    CONST FIELD_DESIGNATION = "designation";
    CONST FIELD_DEPARTMENT = "department";
    CONST FIELD_UNIT = "unit";
    CONST FIELD_JOB_DESCRIPTION = "job_description";
    CONST FIELD_DATE_OF_BIRTH = "date_of_birth";
    CONST FIELD_SPECIALIZATION = "specialization";
    CONST FIELD_MOBILE = "mobile";
    CONST FIELD_NID_PATH = "nid_path";
    CONST FIELD_IMAGE_PATH = "image_path";
    CONST FIELD_EMAIL = "email";
    CONST FIELD_TYPE = "type";

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

}
