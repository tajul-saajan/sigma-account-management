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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text(Employee::FIELD_NAME);
            $table->text(Employee::FIELD_DESIGNATION);
            $table->text(Employee::FIELD_DEPARTMENT);
            $table->text(Employee::FIELD_UNIT);
            $table->text(Employee::FIELD_JOB_DESCRIPTION);
            $table->text(Employee::FIELD_DATE_OF_BIRTH);
            $table->text(Employee::FIELD_SPECIALIZATION);
            $table->text(Employee::FIELD_MOBILE);
            $table->text(Employee::FIELD_NID_PATH);
            $table->text(Employee::FIELD_IMAGE_PATH);
            $table->text(Employee::FIELD_EMAIL);
            $table->text(Employee::FIELD_TYPE);
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
