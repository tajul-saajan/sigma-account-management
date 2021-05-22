<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    CONST FIELD_NAME = 'name';
    CONST FIELD_DESCRIPTION = 'description';
    CONST FIELD_COL1 = 'col1';
    CONST FIELD_COL2 = 'col2';
    CONST FIELD_COL3 = 'col3';
    CONST FIELD_BALANCE = 'balance';

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
