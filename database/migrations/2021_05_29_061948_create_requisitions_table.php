<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Requisition;

class CreateRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('requisitions');
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text(Requisition::FIELD_REASON);
            $table->text(Requisition::FIELD_DESCRIPTION);
            $table->text(Requisition::FIELD_COMMENT)->nullable();
            $table->text(Requisition::FIELD_REFERENCE)->nullable();
            $table->text(Requisition::FIELD_ATTACHMENT_PATH)->nullable();
            $table->text(Requisition::FIELD_AMOUNT);
            $table->string(Requisition::FIELD_ENDORSED)->default("Pending");
            $table->text(Requisition::FIELD_ENDORSED_BY)->nullable();
            $table->string(Requisition::FIELD_APPROVED)->default("Pending");
            $table->text(Requisition::FIELD_APPROVED_BY)->nullable();
            $table->text(Requisition::FIELD_APPLIED_BY)->nullable();
            $table->text(Requisition::FIELD_APPLIED_AT)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisitions');
    }
}
