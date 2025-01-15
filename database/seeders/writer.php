<?php

namespace Database\Seeders;

use App\Models\writer as ModelsWriter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class writer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = ModelsWriter::create([
            'name' => 'admin',
            'email' => 'whrite@gmail.com',
            'password' => bcrypt('123123123')
        ]);

        $user2 = ModelsWriter::create([
            'name' => 'admin',
            'email' => 'awhrite@gmail.com',
            'password' => bcrypt('123123')
        ]);
    }
}