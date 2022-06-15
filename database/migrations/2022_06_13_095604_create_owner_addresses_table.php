<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('owner_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')
                ->constrained()
                ->cascadeOnUpdate();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->text('note')->nullable();
            $table->boolean('default')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('owner_addresses');
    }
};
