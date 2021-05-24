<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountSubType extends Model
{
    use HasFactory;

    const FIELD_NAME = "name";
    const FIELD_DESCRIPTION = "description";
    const FIELD_ACCOUNT_TYPE_ID = "account_type_id";
    const FIELD_ACCOUNT_TYPE_NAME = "account_type_name";

    protected $guarded = ['id' , 'created_at' , 'updated_at'];

    public function accountType() {
        return $this->belongsTo(AccountType::class,self::FIELD_ACCOUNT_TYPE_ID);
    }

    public function chartOfAccounts() {
        return $this->hasMany(ChartOfAccount::class);
    }

    //model events
    protected static function booted()
    {
        static::updating(function ($accountSubType) {
            $coas = $accountSubType->chartOfAccounts;
            foreach ($coas as $coa){
                $coa->account_subtype_name = $accountSubType->name;
                $coa->update();
            }
        });
    }

}
