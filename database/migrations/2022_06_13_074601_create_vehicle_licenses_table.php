<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('vehicle_licenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')
                ->constrained()
                ->cascadeOnUpdate();
            $table->string('type');
            $table->string('number');
            $table->date('first_issued_date')->nullable();
            $table->date('issued_date');
            $table->date('expiration_date');
            $table->boolean('verified')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicle_licenses');
    }
};
