<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    const FIELD_TRANSACTION_TYPE = "transaction_type";
    const FIELD_CASH_OR_CHECK = "cash_or_check";
    const FIELD_DESCRIPTION = "description";
    const FIELD_SOURCE_ID = "source_id";
    const FIELD_SOURCE_NAME = "source_name";
    const FIELD_DESTINATION_ID = "destination_id";
    const FIELD_DESTINATION_NAME = "destination_name";
    const FIELD_REASON = "reason";
    const FIELD_REFERENCE = "reference";
    const FIELD_INVOICE_PATH = "invoice_path";
    const FIELD_SUB_PROJECT_ID = "sub_project_id";
    const FIELD_SUB_PROJECT_NAME = "sub_project_name";
    const FIELD_AMOUNT = "amount";
    const FIELD_CHEQUE_NO = "cheque_no";
    const FIELD_BANK_ID = "bank_id";
    const FIELD_BANK_NAME = "bank_name";
    const FIELD_CHEQUE_IMAGE_PATH = "cheque_image_path";
    const FIELD_JOURNAL_ID = "journal_id";

    const FIELD_INSERTED_BY = "inserted_by";
    const FIELD_UPDATED_BY = "updated_by";
    const FIELD_LAST_UPDATE_TIME = "last_update_time";

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function journal()
    {
        return $this->belongsTo(Journal::class, self::FIELD_JOURNAL_ID);
    }

    protected static function booted()
    {
        static::creating(function ($transaction) {
            $journal = Journal::make();
            $journal->description = $transaction->description;
            $journal->reference_1 = $transaction->reference;
            $journal->amount = $transaction->amount;
            $journal->invoice_no = $transaction->cheque_no; //todo change
            $journal->sub_project_id = $transaction->sub_project_id;
            $journal->sub_project_name = $transaction->sub_project_name;
            $journal->transaction_date = Carbon::now();

            if ($transaction->transaction_type === 'cash in') {

                $source = ChartOfAccount::find($transaction->source_id);

                if ($transaction->cash_or_check === 'cash') {
                    $cash = ChartOfAccount::where(ChartOfAccount::FIELD_GL_NAME, 'Cash')->get()->first();
                    $journal->debit_account_id = $cash->id;
                    $journal->debit_account_name = $cash->gl_name;
                    $cash->balance += $transaction->amount;
                    $cash->update();

                } else {
                    $bank = ChartOfAccount::find($transaction->bank_id);
                    $journal->debit_account_id = $bank->id;
                    $journal->debit_account_name = $bank->gl_name;
                    $bank->balance += $transaction->amount;
                    $bank->update();
                }
                $journal->credit_account_id = $transaction->source_id;
                $journal->credit_account_name = $transaction->source_name;
                $journal->save();
                $source->balance -= $transaction->amount;
                $source->update();
            }
            else{
                $destination = ChartOfAccount::find($transaction->destination_id);

                if ($transaction->cash_or_check === 'cash') {
                    $cash = ChartOfAccount::where(ChartOfAccount::FIELD_GL_NAME, 'Cash')->get();
                    $journal->credit_account_id = $cash->id;
                    $journal->credit_account_name = $cash->gl_name;
                    $cash->balance -= $transaction->amount;
                    $cash->update();

                } else {
                    $bank = ChartOfAccount::find($transaction->bank_id);
                    $journal->credit_account_id = $bank->id;
                    $journal->credit_account_name = $bank->gl_name;
                    $bank->balance -= $transaction->amount;
                    $bank->update();
                }
                $journal->debit_account_id = $transaction->destination_id;
                $journal->debit_account_name = $transaction->destination_name;
                $journal->save();
                $destination->balance += $transaction->amount;
                $destination->update();

                $transaction->journal_id = $journal->id;
            }
            $transaction->journal_id = $journal->id;

        });
    }

}
