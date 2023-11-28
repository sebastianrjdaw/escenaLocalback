<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'SalaPrueba',
            'email' => 'salaprueba@admin.com',
            'password' => bcrypt('abc123.'),
            'rol' => 'sala'
        ]);
        User::create([
            'name' => 'AsistentePrueba',
            'email' => 'asistenteprueba@admin.com',
            'password' => bcrypt('abc123.'),
            'rol' => 'asistente'
        ]);User::create([
            'name' => 'ArtistaPrueba',
            'email' => 'artistaPrueba@admin.com',
            'password' => bcrypt('abc123.'),
            'rol' => 'artista'
        ]);
    }
}
