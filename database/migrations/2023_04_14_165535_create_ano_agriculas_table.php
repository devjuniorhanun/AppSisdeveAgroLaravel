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

        Schema::create('ano_agriculas', function (Blueprint $table) {
            $table->foreignUuid('empresa_id')->constrained();
            $table->uuid('id')->primary();
            $table->string('nome')->unique();
            $table->date('data_abertura')->nullable();
            $table->date('data_fechamento')->nullable();
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
        Schema::dropIfExists('ano_agriculas');
    }
};
