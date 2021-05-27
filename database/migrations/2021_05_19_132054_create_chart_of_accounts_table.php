<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ChartOfAccount;

class CreateChartOfAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('chart_of_accounts');
        Schema::create('chart_of_accounts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text(ChartOfAccount::FIELD_GL_NAME);
            $table->text(ChartOfAccount::FIELD_BALANCE);
            $table->unsignedBigInteger(ChartOfAccount::FIELD_ACC_SUB_TYPE_ID);
            $table->text(ChartOfAccount::FIELD_ACC_SUB_TYPE_NAME);

            $table->boolean(ChartOfAccount::FIELD_CASH_IN_CASH_CREDIT)->nullable();
            $table->boolean(ChartOfAccount::FIELD_CASH_OUT_CASH_DEBIT)->nullable();

            $table->boolean(ChartOfAccount::FIELD_CASH_IN_CHEQUE_CREDIT)->nullable();
            $table->boolean(ChartOfAccount::FIELD_CASH_IN_CHEQUE_DEBIT)->nullable();

            $table->boolean(ChartOfAccount::FIELD_CASH_OUT_CHEQUE_DEBIT)->nullable();
            $table->boolean(ChartOfAccount::FIELD_CASH_OUT_CHEQUE_CREDIT)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chart_of_accounts');
    }
}
