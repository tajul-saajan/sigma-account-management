<?php

use App\Models\ProjectOffer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_offers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string(ProjectOffer::FIELD_PO_STATUS)->nullable();
            $table->string(ProjectOffer::FIELD_OFFER_REFERENCE_NO)->nullable();
            $table->string(ProjectOffer::FIELD_OFFER_DATE)->nullable();
            $table->string(ProjectOffer::FIELD_PROJECT_NAME)->nullable();
            $table->string(ProjectOffer::FIELD_CLIENT)->nullable();
            $table->string(ProjectOffer::FIELD_POC)->nullable();
            $table->string(ProjectOffer::FIELD_PO_AMOUNT_WITH_VAT)->nullable();
            $table->string(ProjectOffer::FIELD_VAT)->nullable();
            $table->string(ProjectOffer::FIELD_AIT)->nullable();
            $table->string(ProjectOffer::FIELD_SUBMIT_TYPE)->nullable();
            $table->string(ProjectOffer::FIELD_AMC_TYPE)->nullable();

            $table->string(ProjectOffer::FIELD_SUB_CONTRACT)->nullable();

            $table->string(ProjectOffer::FIELD_SUB_CONTRACTED_TO)->nullable();
            $table->string(ProjectOffer::FIELD_SUB_CONTRACTED_AMOUNT)->nullable();

            $table->string(ProjectOffer::FIELD_SUB_CONTRACTED_BALANCE)->nullable();
            $table->string(ProjectOffer::FIELD_PO_DATE)->nullable();
            $table->string(ProjectOffer::FIELD_E_BILL_SUBMISSION_DATE)->nullable();
            $table->string(ProjectOffer::FIELD_HARD_COPY_SUBMISSION_DATE)->nullable();
            $table->string(ProjectOffer::FIELD_MONEY_RECEIVE_DATE)->nullable();
            $table->string(ProjectOffer::FIELD_PO)->nullable();
            $table->string(ProjectOffer::FIELD_MUSHOK_NO)->nullable();
            $table->string(ProjectOffer::FIELD_TRACKING_NO_ROBI)->nullable();
            $table->string(ProjectOffer::FIELD_RECEIVED_AMOUNT)->nullable();
            $table->string(ProjectOffer::FIELD_INSERT_TIME)->nullable();
            $table->string(ProjectOffer::FIELD_LAST_UPDATE_TIME)->nullable();
            $table->string(ProjectOffer::FIELD_INSERTED_BY)->nullable();
            $table->string(ProjectOffer::FIELD_LAST_UPDATED_BY)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_offers');
    }
}
