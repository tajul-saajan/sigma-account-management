<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartOfAccount extends Model
{
    use HasFactory;

    const FIELD_GL_NAME = 'gl_name';
    const FIELD_BALANCE = 'balance';

    const FIELD_ACC_SUB_TYPE_ID = 'account_subtype_id';
    const FIELD_ACC_SUB_TYPE_NAME = 'account_subtype_name';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function accountSubType()
    {
        return $this->belongsTo(AccountSubType::class, self::FIELD_ACC_SUB_TYPE_ID);
    }

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }

}
