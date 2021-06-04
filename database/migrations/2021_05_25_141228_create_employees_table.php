<?php

use App\Models\Employee;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('employees');
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text(Employee::FIELD_USER_ID);
            $table->text(Employee::FIELD_NAME)->nullable();
            $table->text(Employee::FIELD_DESIGNATION)->nullable();
            $table->text(Employee::FIELD_DEPARTMENT)->nullable();
            $table->text(Employee::FIELD_UNIT)->nullable();
            $table->text(Employee::FIELD_JOB_DESCRIPTION)->nullable();
            $table->text(Employee::FIELD_DATE_OF_BIRTH)->nullable();
            $table->text(Employee::FIELD_SPECIALIZATION)->nullable();
            $table->text(Employee::FIELD_MOBILE)->nullable();
            $table->text(Employee::FIELD_NID_PATH)->nullable();
            $table->text(Employee::FIELD_IMAGE_PATH)->nullable();
            $table->text(Employee::FIELD_EMAIL)->nullable();
            $table->text(Employee::FIELD_TYPE)->nullable();
            $table->text(Employee::FIELD_ACCOUNT_NO)->nullable();
            $table->text(Employee::FIELD_BANK)->nullable();
            $table->text(Employee::FIELD_ADDRESS)->nullable();
            $table->text(Employee::FIELD_LEAVE_BALANCE)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
