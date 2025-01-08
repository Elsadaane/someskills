<?php

namespace Database\Seeders;

use App\Models\Contact_Us;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Contact_UsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact_Us::truncate();
    Contact_Us::create([
        'name_ar'=>'مزون للتصميم والبرمجة',
        'name_en'=>'Mazon for Design and Programming',
        'email'=>'mazon@gmail.com',
        'phone'=>'01212309315',
        'subject_ar'=>'لايوجد',
        'subject_en'=>'emty',
        'message_ar'=>'اهلا بكم في مزون للتصميم والبرمجة',
        'message_en'=>'welcome to Mazon for Design and Programming',
    ]);
    }
}