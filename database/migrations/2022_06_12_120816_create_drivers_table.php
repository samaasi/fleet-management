<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->string('first_name');
            $table->string('other_name');
            $table->string('last_name');
            $table->string('mothers_maiden_name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('nationality');
            $table->string('national_identity_number');
            $table->string('marital_status');
            $table->string('place_of_birth');
            $table->string('state_of_origin');
            $table->string('religion');
            $table->string('local_govt');
            $table->string('community');
            $table->string('compound_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('drivers');
    }
};
