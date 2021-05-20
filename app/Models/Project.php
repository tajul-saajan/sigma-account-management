<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    CONST FIELD_NAME = "name";
    CONST FIELD_DESCRIPTION = "description";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function subProjects() {
        return $this->hasMany(SubProject::class);
    }
}
