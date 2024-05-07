<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255,)->nullable(false);
            $table->string('especie', 120)->nullable(false);
            $table->decimal('peso', 120)->nullable(false);
            $table->decimal('altura', 120)->nullable(false);
            $table->string('sexo', 20)->nullable(false);
            $table->string('dieta', 200)->nullable(false);
            $table->string('habitat', 120)->nullable(false);
            $table->integer('idade')->nullable(false);
            $table->string('ra',10)->nullable(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
