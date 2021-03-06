<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\AccountSubType;

class CreateAccountSubTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('account_sub_types');
        Schema::create('account_sub_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string(AccountSubType::FIELD_NAME);
            $table->text(AccountSubType::FIELD_DESCRIPTION);
            $table->unsignedBigInteger(AccountSubType::FIELD_ACCOUNT_TYPE_ID);
            $table->string(AccountSubType::FIELD_ACCOUNT_TYPE_NAME);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_sub_types');
    }
}
