<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::truncate();
        $stting = [
            'website_name_ar'=>'مزون للتصميم والبرمجة',
            'website_name_en'=>'Mazon for Design and Programming',
            'email' => 'abdoelsadaane@example.com',
            'phone' => '0123456789',
            'logo' => asset('logo.png'),
        ];
        Setting::create($stting);
    }
}
