<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\AccountType;

class CreateAccountTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('account_types');
        Schema::create('account_types', function (Blueprint $table) {
            $table->id();
            $table->string(AccountType::FEILD_TYPE);
            $table->string(AccountType::FEILD_DESCRIPTION);
            $table->string(AccountType::FEILD_CLASSIFICATION);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_types');
    }
}
