<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Journal;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('journals');
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime(Journal::FIELD_TRANSACTION_DATE)->nullable();
            $table->text(Journal::FIELD_DESCRIPTION)->nullable();
            $table->unsignedBigInteger(Journal::FIELD_DEBIT_ACCOUNT_ID)->nullable();
            $table->text(Journal::FIELD_DEBIT_ACCOUNT_NAME)->nullable();
            $table->unsignedBigInteger(Journal::FIELD_CREDIT_ACCOUNT_ID)->nullable();
            $table->text(Journal::FIELD_CREDIT_ACCOUNT_NAME)->nullable();
            $table->text(Journal::FIELD_REFERENCE_1)->nullable();
            $table->text(Journal::FIELD_ATTACHMENT_1)->nullable();
            $table->text(Journal::FIELD_REFERENCE_2)->nullable();
            $table->text(Journal::FIELD_ATTACHMENT_2)->nullable();
            $table->text(Journal::FIELD_ADJUSTED_ENTRY)->nullable();
            $table->unsignedBigInteger(Journal::FIELD_SUB_PROJECT_ID)->nullable();
            $table->text(Journal::FIELD_SUB_PROJECT_NAME)->nullable();
            $table->text(Journal::FIELD_AMOUNT)->nullable();
            $table->text(Journal::FIELD_INVOICE_NO)->nullable();
            $table->dateTime(Journal::FIELD_LAST_UPDATE_TIME)->nullable();
            $table->text(Journal::FIELD_INSERTED_BY)->nullable();
            $table->text(Journal::FIELD_UPDATED_BY)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journals');
    }
}
