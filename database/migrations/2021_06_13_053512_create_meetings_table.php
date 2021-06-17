<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Meeting;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text(Meeting::FIELD_TITLE);
            $table->dateTime(Meeting::FIELD_DATE);
            $table->text(Meeting::FIELD_OBJECTIVE);
            $table->text(Meeting::FIELD_DESCRIPTION);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
