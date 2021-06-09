<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    use HasFactory;

    CONST FIELD_USER_ID = "user_id";
    CONST FIELD_DESCRIPTION = "description";
    CONST FIELD_REASON = "reason";
    CONST FIELD_COMMENT = "comment";
    CONST FIELD_REFERENCE = "reference";
    CONST FIELD_ATTACHMENT_PATH = "attachment_path";
    CONST FIELD_AMOUNT = "amount";
    CONST FIELD_ENDORSED = "endorsed";
    CONST FIELD_ENDORSED_BY = "endorsed_by";
    CONST FIELD_APPROVED = "approved";
    CONST FIELD_APPROVED_BY = "approved_by";

    CONST FIELD_APPLIED_BY = "applied_by";
    CONST FIELD_APPLIED_AT = "applied_at";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
