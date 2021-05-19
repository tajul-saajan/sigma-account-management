<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountSubType extends Model
{
    use HasFactory;

    const FIELD_NAME = "name";
    const FIELD_DESCRIPTION = "description";

    protected $guarded = ['id' , 'created_at' , 'updated_at'];

    public function accountType() {
        return $this->belongsTo(AccountType::class);
    }
}
