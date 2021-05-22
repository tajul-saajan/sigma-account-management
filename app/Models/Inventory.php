<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    CONST FIELD_NAME = "name";
    CONST FIELD_DESCRIPTION = "description";
    CONST FIELD_LOCATION = "location";

    protected $guarded = ['id', 'created_at', 'updated_at'];

}
