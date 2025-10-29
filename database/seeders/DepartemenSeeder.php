<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    public function run()
    {
    Departemen::create(['nama_departemen' => 'HRD']);
    Departemen::create(['nama_departemen' => 'IT']);
    Departemen::create(['nama_departemen' => 'Keuangan']);
    }
}

