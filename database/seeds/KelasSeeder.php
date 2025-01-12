<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas::insert([
            ['name' => 'VII A'],
            ['name' => 'VII B'],
            ['name' => 'VII C'],
            ['name' => 'VIII A'],
            ['name' => 'VIII B'],
            ['name' => 'VIII C'],
            ['name' => 'IX A'],
            ['name' => 'IX B'],
            ['name' => 'IX C'],
        ]);
    }
}
