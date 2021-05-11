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
            $table->string(ProjectOffer::FIELD_PO_STATUS);
            $table->string(ProjectOffer::FIELD_SUBMIT_TYPE);
            $table->string(ProjectOffer::FIELD_AMC_TYPE);
            $table->string(ProjectOffer::FIELD_SUB_CONTRACT);
            $table->string(ProjectOffer::FIELD_SUB_CONTRACTED_TO);
            $table->string(ProjectOffer::FIELD_SUB_CONTRACTED_AMOUNT);
            $table->string(ProjectOffer::FIELD_SUB_CONTRACTED_BALANCE);
            $table->string(ProjectOffer::FIELD_OFFER_REFERENCE_NO);
            $table->string(ProjectOffer::FIELD_OFFER_DATE);
            $table->string(ProjectOffer::FIELD_PO_DATE);
            $table->string(ProjectOffer::FIELD_BILL_SUBMISSION_DATE);
            $table->string(ProjectOffer::FIELD_MONEY_RECEIVE_DATE);
            $table->string(ProjectOffer::FIELD_PO);
            $table->string(ProjectOffer::FIELD_PROJECT_NAME);
            $table->string(ProjectOffer::FIELD_MUSHOK_NO);
            $table->string(ProjectOffer::FIELD_TRACKING_NO_ROBI);
            $table->string(ProjectOffer::FIELD_CLIENT);
            $table->string(ProjectOffer::FIELD_POC);
            $table->string(ProjectOffer::FIELD_PO_AMOUNT_WITH_VAT);
            $table->string(ProjectOffer::FIELD_VAT);
            $table->string(ProjectOffer::FIELD_AIT);
            $table->string(ProjectOffer::FIELD_EXPECTED_RECEIVED_AMOUNT);
            $table->string(ProjectOffer::FIELD_RECEIVED_AMOUNT);
            $table->string(ProjectOffer::FIELD_INSERT_TIME);
            $table->string(ProjectOffer::FIELD_LAST_UPDATE_TIME);
            $table->string(ProjectOffer::FIELD_INSERTED_BY);
            $table->string(ProjectOffer::FIELD_LAST_UPDATED_BY);
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
