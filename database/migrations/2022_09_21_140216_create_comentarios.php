<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->string ('Contenido');
            $table->enum("Clasificasion", ["Me interesa", "No me interesa"]);// <-- Aquí el enum
            $table->date ('Fecha_comentario');

            $table->foreignId('id_publicacion')
            ->nullable()
            ->constrained('publicacionevento')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('id_usuario')
            ->nullable()
            ->constrained('users')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
};
