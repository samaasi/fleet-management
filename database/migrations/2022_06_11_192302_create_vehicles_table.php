<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate();
            $table->string('make');
            $table->string('model');
            $table->string('body_type');
            $table->string('color');
            $table->string('series')->nullable();
            $table->string('engine_number')->nullable();
            $table->string('engine_type')->nullable();
            $table->string('vehicle_identification_number')->nullable();
            $table->string('chassis_number')->nullable();
            $table->string('initial_mileage')->nullable();
            $table->string('usage_type')->nullable();
            $table->string('mode')->comment('eg:maintenance');
            $table->string('gear_box_type')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('average_consumption')->nullable();
            $table->string('carbon_emissions')->nullable();
            $table->string('range')->nullable();
            $table->string('top_speed')->nullable();
            $table->string('length')->nullable();
            $table->string('height')->nullable();
            $table->string('curb_weight')->nullable();
            $table->string('maximum_towing_capacity_weight')->nullable();
            $table->string('trunk_capacity')->nullable();
            $table->string('drive_type')->nullable();
            $table->string('engine_size')->nullable();
            $table->string('number_of_cylinder')->nullable();
            $table->string('engine_output')->nullable();
            $table->string('torque')->nullable();
            $table->text('known_damages')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
