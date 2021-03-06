<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItems extends Model
{
    use HasFactory;

    const FIELD_INVENTORY_ID = 'inventory_id';
    const FIELD_ITEM_NAME = 'item_name';
    const FIELD_INVENTORY_NAME = ' ';
    const FIELD_BALANCE = 'balance';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function inventory(){
        return $this->belongsTo(Inventory::class,self::FIELD_INVENTORY_ID);
    }
}
