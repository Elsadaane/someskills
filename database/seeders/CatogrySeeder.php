<?php

namespace Database\Seeders;

use App\Models\Posts_category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatogrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Posts_category::create([
            'name_category_ar'=>'اخبار',
            'name_category_en'=>'news',
            'description_category_ar'=>'اخبار رياضية',
            'description_category_en'=>'news sport',
            'image'=>asset('header.jpg'),
        ]);
    }
}