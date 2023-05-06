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
        Schema::disableForeignKeyConstraints();

        Schema::create('proprietarios', function (Blueprint $table) {
            $table->foreignUuid('empresa_id')->constrained();
            $table->uuid('id')->primary();
            $table->string('razao_social')->unique();
            $table->string('nome_fantasia')->unique();
            $table->string('abreviacao')->unique();
            $table->string('tipo_pagamento', 1);
            $table->string('tipo', 1);
            $table->date('data_nascimento');
            $table->string('nascionalidade')->nullable();
            $table->string('naturalidade')->nullable();
            $table->string('estado_civel', 1);
            $table->string('cpf_cnpj')->nullable();
            $table->string('rg_inscriacao')->nullable();
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('cep')->nullable();
            $table->string('estado')->nullable();
            $table->string('cidade')->nullable();
            $table->string('bairro')->nullable();
            $table->string('endereco')->nullable();
            $table->string('complemento')->nullable();
            $table->string('numero')->nullable();
            $table->boolean('status');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proprietarios');
    }
};
