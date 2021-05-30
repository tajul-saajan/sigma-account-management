<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ApplyForLeave;

class CreateApplyForLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_for_leaves', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text(ApplyForLeave::FIELD_LEAVE_TYPE);
            $table->date(ApplyForLeave::FIELD_FROM_DATE);
            $table->date(ApplyForLeave::FIELD_TO_DATE);
            $table->text(ApplyForLeave::FIELD_NO_OF_DAYS);
            $table->text(ApplyForLeave::FIELD_DOA);
            $table->text(ApplyForLeave::FIELD_DEPENDENCY);
            $table->string(ApplyForLeave::FIELD_ENDORSED)->default("Pending");
            $table->text(ApplyForLeave::FIELD_ENDORSED_BY);
            $table->string(ApplyForLeave::FIELD_APPROVED)->default("Pending");
            $table->text(ApplyForLeave::FIELD_APPROVED_BY);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apply_for_leaves');
    }
}
