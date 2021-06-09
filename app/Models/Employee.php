<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    CONST FIELD_NAME = "name";
    CONST FIELD_USER_ID = "user_id";
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
    CONST FIELD_ACCOUNT_NO = "account_no";
    CONST FIELD_BANK = "bank";
    CONST FIELD_ADDRESS = "address";
    CONST FIELD_LEAVE_BALANCE = "leave_balance";

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
