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
        Schema::create('profesoresaulas', function (Blueprint $table) {
            $table->id('ID_profesoresaulas');
            $table->unsignedBigInteger('Profesores_ID');
            $table->unsignedBigInteger('ID_aula');
            

            $table->foreign('Profesores_ID')->references('Profesores_ID')->on('profesores')->onDelete('cascade');
            $table->foreign('ID_aula')->references('ID_aula')->on('aulas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesores_aulas');
    }
};
