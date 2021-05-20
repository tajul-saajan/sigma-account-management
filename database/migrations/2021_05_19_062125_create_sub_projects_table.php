<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\SubProject;

class CreateSubProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('sub_projects');
        Schema::create('sub_projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string(SubProject::FIELD_NAME);
            $table->string(SubProject::FIELD_DESCRIPTION);
            $table->integer(SubProject::FIELD_PROJECT_ID);
            $table->string(SubProject::FIELD_PROJECT_NAME);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_projects');
    }
}
