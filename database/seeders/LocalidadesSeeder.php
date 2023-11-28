<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LocalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(storage_path('app/localidades.json'));
        $localidades = json_decode($json, true);

        foreach ($localidades as $localidad) {
            DB::table('localidades')->insert([
                'nombre' => $localidad['label'],
                'provincia_id' => $localidad['parent_code'],
            ]);
        }
    }
}
