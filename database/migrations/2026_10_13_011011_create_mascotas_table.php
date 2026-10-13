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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('dueno');
            $table->string('telefono_dueno', 20)->nullable();
            $table->string('especie', 50);
            $table->string('raza')->nullable();
            $table->unsignedInteger('edad')->nullable();
            $table->enum('sexo', ['Macho', 'Hembra', 'No especificado'])
                ->default('No especificado');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
