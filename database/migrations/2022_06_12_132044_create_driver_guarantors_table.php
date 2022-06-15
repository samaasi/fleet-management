<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('driver_guarantors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')
                ->constrained()
                ->cascadeOnUpdate();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_name');
            $table->string('national_identification_number')->nullable();
            $table->string('gender');
            $table->date('date_of_birth')->comment('must be => 30');
            $table->string('phone');
            $table->string('email');
            $table->string('bank_name');
            $table->string('bank_account_number');
            $table->string('employment_status');
            $table->string('financial_status');
            $table->string('employer_address')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('relationship');
            $table->boolean('verified')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver_guarantors');
    }
};
