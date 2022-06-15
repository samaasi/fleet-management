<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('driver_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')
                ->constrained()
                ->cascadeOnUpdate();
            $table->string('address');
            $table->string('city');
            $table->string('local_govt');
            $table->string('state');
            $table->string('nearest_bus_stop');
            $table->string('phone');
            $table->string('email');
            $table->text('note')->nullable();
            $table->boolean('default')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver_contacts');
    }
};
