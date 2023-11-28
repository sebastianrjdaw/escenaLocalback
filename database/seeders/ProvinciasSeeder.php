<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProvinciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(storage_path('app/provincias.json'));
        $provincias = json_decode($json, true);

        foreach ($provincias as $provincia) {
            DB::table('provincias')->insert([
                'id' => $provincia['code'],
                'nombre' => $provincia['label'],
            ]);
        }
    }
}
