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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('rol');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar registros relacionados en la tabla perfils
        DB::table('perfils')->delete();

        // Eliminar clave foránea en la tabla perfils
        Schema::table('perfils', function (Blueprint $table) {
            $table->dropForeign(['perfilable_id']);
        });

        // Eliminar la tabla perfils
        Schema::dropIfExists('perfils');

        // Eliminar la tabla users
        Schema::dropIfExists('users');
    }
};

