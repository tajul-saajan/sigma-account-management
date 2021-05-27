<?php

use App\Models\Transaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('transactions');
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text(Transaction::FIELD_TRANSACTION_TYPE)->nullable();
            $table->text(Transaction::FIELD_CASH_OR_CHECK)->nullable();
            $table->text(Transaction::FIELD_DESCRIPTION)->nullable();
            $table->text(Transaction::FIELD_SOURCE_ID)->nullable();
            $table->text(Transaction::FIELD_SOURCE_NAME)->nullable();
            $table->text(Transaction::FIELD_DESTINATION_ID)->nullable();
            $table->text(Transaction::FIELD_DESTINATION_NAME)->nullable();
            $table->text(Transaction::FIELD_REASON)->nullable();
            $table->text(Transaction::FIELD_REFERENCE)->nullable();
            $table->text(Transaction::FIELD_INVOICE_PATH)->nullable();
            $table->text(Transaction::FIELD_SUB_PROJECT_ID)->nullable();
            $table->text(Transaction::FIELD_SUB_PROJECT_NAME)->nullable();
            $table->text(Transaction::FIELD_AMOUNT)->nullable();
            $table->text(Transaction::FIELD_CHEQUE_NO)->nullable();
            $table->text(Transaction::FIELD_BANK_ID)->nullable();
            $table->text(Transaction::FIELD_BANK_NAME)->nullable();
            $table->text(Transaction::FIELD_CHEQUE_IMAGE_PATH)->nullable();

            $table->unsignedBigInteger(Transaction::FIELD_JOURNAL_ID)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
