<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    CONST FIELD_TRANSACTION_DATE = "transaction_date";
    CONST FIELD_DESCRIPTION = "description";
    CONST FIELD_DEBIT_ACCOUNT = "debit_account";
    CONST FIELD_CREDIT_ACCOUNT = "credit_account";
    CONST FIELD_REFERENCE = "reference";
    CONST FIELD_ADJUSTED_ENTRY = "adjusted_entry";
    CONST FIELD_SUB_PROJECT = "sub_project";
    CONST FIELD_AMOUNT = "amount";
    CONST FIELD_INVOICE_NO = "invoice_no";
    CONST FIELD_ATTACHMENT_1 = "attachment_1";
    CONST FIELD_ATTACHMENT_2 = "attachment_2";
    CONST FIELD_LAST_UPDATE_TIME = "last_update_time";
    CONST FIELD_INSERTED_BY = "inserted_by";
    CONST FIELD_UPDATED_BY = "updated_by";

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
