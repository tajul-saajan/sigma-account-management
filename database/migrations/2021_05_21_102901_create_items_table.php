<?php

use App\Models\Item;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text(Item::FIELD_NAME);
            $table->text(Item::FIELD_DESCRIPTION);
            $table->text(Item::FIELD_COL1);
            $table->text(Item::FIELD_COL2);
            $table->text(Item::FIELD_COL3);
            $table->text(Item::FIELD_BALANCE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
