<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('driver_licenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')
                ->constrained()
                ->cascadeOnUpdate();
            $table->string('type');
            $table->string('generic')->nullable();
            $table->string('class')->nullable();
            $table->string('number');
            $table->date('first_issued_date')->nullable();
            $table->date('issued_date');
            $table->date('expiration_date')->nullable();
            $table->boolean('verified')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver_licenses');
    }
};
