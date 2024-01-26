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
            $table->int('precipitacion')->nullable();
            $table->float('temp')->nullable();
            $table->int('humedad')->nullable();
            $table->int('sensTermica')->nullable();
            $table->string('dirViento')->nullable();
            $table->int('velViento')->nullable();
            $table->int('idMunicipio')->nullable();
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
