<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\PublicHoliday;

class CreatePublicHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_holidays', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime(PublicHoliday::FIELD_DATE);
            $table->text(PublicHoliday::FIELD_DESCRIPTION);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_holidays');
    }
}
