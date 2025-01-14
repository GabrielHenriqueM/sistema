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
        Schema::create('apartamentos', function (Blueprint $table) {
            $table->id();
            $table->string('bloco_predio');
            $table->string('numero_apartamento');
            $table->integer('andar');
            $table->string('rua');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep');
            $table->integer('quantidade_quartos');
            $table->integer('quantidade_banheiros');
            $table->integer('quantidade_vagas_garagem');
            $table->string('varanda_sacada');
            $table->string('area_lazer_condominio');
            $table->string('moveis_planejados');
            $table->float('area_total');
            $table->float('preco_imovel');
            $table->float('valor_condominio');
            $table->string('status')->default('disponivel'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartamentos');
    }
};