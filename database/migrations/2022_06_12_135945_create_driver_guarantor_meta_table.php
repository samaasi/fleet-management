<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('driver_guarantor_meta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_guarantor_id')
                ->constrained('driver_guarantors')
                ->cascadeOnUpdate();
            $table->string('key');
            $table->string('value');
            $table->string('type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver_guarantor_meta');
    }
};
