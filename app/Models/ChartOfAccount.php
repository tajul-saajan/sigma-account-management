<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartOfAccount extends Model
{
    use HasFactory;

    const FIELD_GL_NAME = 'gl_name';
    const FIELD_BALANCE = 'balance';

    const FIELD_ACC_SUB_TYPE_ID = 'account_sub_type_id';
    const FIELD_ACC_SUB_TYPE_NAME = 'account_subtype_name';

    const FIELD_CASH_IN_CASH_CREDIT = 'cash_in_cash_credit';
    const FIELD_CASH_OUT_CASH_DEBIT = 'cash_out_cash_debit';

    const FIELD_CASH_IN_CHEQUE_CREDIT = 'cash_in_cheque_credit';
    const FIELD_CASH_IN_CHEQUE_DEBIT = 'cash_in_cheque_debit';

    const FIELD_CASH_OUT_CHEQUE_DEBIT = 'cash_out_cheque_debit';
    const FIELD_CASH_OUT_CHEQUE_CREDIT = 'cash_out_cheque_credit';


    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function accountSubType()
    {
        return $this->belongsTo(AccountSubType::class, self::FIELD_ACC_SUB_TYPE_ID);
    }

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }

    //model events
    protected static function booted()
    {
        static::updating(function ($coa) {
            $debitAccounts = Journal::where(Journal::FIELD_DEBIT_ACCOUNT_ID, $coa->id)->get();
            $creditAccounts = Journal::where(Journal::FIELD_CREDIT_ACCOUNT_ID, $coa->id)->get();

            foreach ($debitAccounts as $debitAccount){
                $debitAccount->debit_account_name = $coa->gl_name;
                $debitAccount->update();
            }

            foreach ($creditAccounts as $creditAccount){
                $creditAccount->credit_account_name = $coa->gl_name;
                $creditAccount->update();
            }
        });
    }


}
