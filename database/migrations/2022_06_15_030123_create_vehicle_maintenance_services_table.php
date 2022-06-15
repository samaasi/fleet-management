<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('vehicle_maintenance_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_maintenance_id')
                ->constrained('vehicle_maintenances')
                ->cascadeOnUpdate();
            $table->string('type');
            $table->string('name');
            $table->integer('cost')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicle_maintenance_services');
    }
};
