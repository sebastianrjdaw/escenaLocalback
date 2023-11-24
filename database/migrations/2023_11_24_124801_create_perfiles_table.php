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
        Schema::create('perfiles', function (Blueprint $table) {
            $table->id();
            $table->text('biografia')->nullable();
            $table->json('redes_sociales')->nullable();
            $table->unsignedBigInteger('perfilable_id');
            $table->string('perfilable_type');
            $table->timestamps();

            // Clave foránea para la relación polimórfica con los usuarios
            $table->foreign('perfilable_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfiles');
    }
};
