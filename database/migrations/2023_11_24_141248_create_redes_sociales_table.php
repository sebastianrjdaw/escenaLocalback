<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedesSocialesTable extends Migration
{
    public function up()
    {
        Schema::create('redes_sociales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perfil_id')->constrained('perfils')->onDelete('cascade');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('pagina_propia')->nullable();
            $table->string('spotify')->nullable(); // Solo artistas
            $table->string('soundcloud')->nullable(); // Solo artistas
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('redes_sociales');
    }
}


