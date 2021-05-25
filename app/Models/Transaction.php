<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    CONST FIELD_TRANSACTION_TYPE = "transaction_type";
    CONST FIELD_CASH_OR_CHECK = "cash_or_check";
    CONST FIELD_TYPE = "type";
    CONST FIELD_DESCRIPTION = "description";
    CONST FIELD_SOURCE = "source";
    CONST FIELD_REASON = "reason";
    CONST FIELD_REFERENCE1 = "reference_1";
    CONST FIELD_REFERENCE2 = "reference_2";
    CONST FIELD_INVOICE_PATH = "invoice_path";
    CONST FIELD_SUB_PROJECT_ID = "sub_project_id";
    CONST FIELD_SUB_PROJECT_NAME = "sub_project_name";
    CONST FIELD_AMOUNT = "amount";
    CONST FIELD_CHEQUE_NO = "cheque_no";
    CONST FIELD_BANK = "bank";
    CONST FIELD_CHEQUE_IMAGE_PATH = "cheque_image_path";
    CONST FIELD_JOURNAL_ID = "journal_id";

    protected $guarded = [
        'id', 'created_at','updated_at'
    ];

    public function journal(){
        return $this->belongsTo(Journal::class,self::FIELD_JOURNAL_ID);
    }
}
