<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('vehicle_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->constrained();
            $table->foreignId('vehicle_id')
                ->constrained()
                ->cascadeOnUpdate();
            $table->dateTime('assigned_date')->nullable();
            $table->dateTime('revoke_date')->nullable();
            $table->foreignId('assigned_by')
                ->nullable()
                ->constrained('users');
            $table->foreignId('revoke_by')
                ->nullable()
                ->constrained('users');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicle_histories');
    }
};
