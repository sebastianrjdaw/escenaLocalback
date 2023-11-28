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
    Schema::create('perfils', function (Blueprint $table) {
        $table->id();
        $table->text('biografia')->nullable();
        $table->string('facebook')->nullable();
        $table->string('twitter')->nullable();
        $table->string('instagram')->nullable();
        $table->string('pagina_propia')->nullable();
        $table->string('spotify')->nullable(); // Solo artistas
        $table->string('soundcloud')->nullable(); // Solo artistas
        $table->timestamps();
        $table->unsignedBigInteger('user_id')->unique();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfils');
    }
    
};

