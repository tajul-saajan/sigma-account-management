<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    use HasFactory;

    const FEILD_TYPE = 'type';
    const FEILD_DESCRIPTION = 'description';
    const FEILD_CLASSIFICATION = 'classification';


    protected $guarded = ['id' , 'created_at' , 'updated_at'];

    public function accountSubTypes()
    {
        return $this->hasMany(AccountSubType::class);
    }

    //model events
    protected static function booted()
    {
        static::updating(function ($accountType) {
            $subTypes = $accountType->accountSubTypes;
            foreach ($subTypes as $subType){
                $subType->account_type_name = $accountType->type;
                $subType->update();
            }
        });
    }
}
