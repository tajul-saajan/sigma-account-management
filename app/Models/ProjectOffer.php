<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectOffer extends Model
{
    use HasFactory;

    const FIELD_PO_STATUS = "po_status";
    const FIELD_SUBMIT_TYPE = "subit_type";
    const FIELD_AMC_TYPE = "amc_type";
    const FIELD_SUB_CONTRACT = "sub_contract";
    const FIELD_SUB_CONTRACTED_TO = "sub_contracted_to";
    const FIELD_SUB_CONTRACTED_AMOUNT = "sub_contracted_amount";
    const FIELD_SUB_CONTRACTED_BALANCE = "sub_contracted_balance";
    const FIELD_OFFER_REFERENCE_NO = "offer_reference_no";
    const FIELD_OFFER_DATE = "offer_date";
    const FIELD_PO_DATE = "po_date";
    const FIELD_BILL_SUBMISSION_DATE = "bill_submission_date";
    const FIELD_MONEY_RECEIVE_DATE = "money_received_date";
    const FIELD_PO = "po";
    const FIELD_PROJECT_NAME = "project_name";
    const FIELD_MUSHOK_NO = "mushok_no";
    const FIELD_TRACKING_NO_ROBI = "tracking_no_robi";
    const FIELD_CLIENT = "client";
    const FIELD_POC = "poc";
    const FIELD_PO_AMOUNT_WITH_VAT = "po_amount_with_vat";
    const FIELD_VAT = "vat";
    const FIELD_AIT = "ait";
    const FIELD_EXPECTED_RECEIVED_AMOUNT = "expected_received_amount";
    const FIELD_RECEIVED_AMOUNT = "received_amount";
    const FIELD_INSERT_TIME = "insert_time";
    const FIELD_LAST_UPDATE_TIME = "last_update_time";
    const FIELD_INSERTED_BY = "inserted_by";
    const FIELD_LAST_UPDATED_BY = "last_updated_by";

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
}
