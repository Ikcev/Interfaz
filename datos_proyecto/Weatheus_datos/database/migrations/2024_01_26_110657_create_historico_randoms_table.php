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
        Schema::create('historico_randoms', function (Blueprint $table) {
            $table->id();
            $table->string('estadoCielo')->nullable();
            $table->integer('precipitacion')->nullable();
            $table->float('temp')->nullable();
            $table->integer('humedad')->nullable();
            $table->integer('sensTermica')->nullable();
            $table->string('dirViento')->nullable();
            $table->integer('velViento')->nullable();
            $table->datetime('horaActual')->nullable();
            $table->unsignedBigInteger('idMunicipio')->nullable();

            $table->foreign('idMunicipio')->references('id')->on('municipios');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_randoms');
    }
};
