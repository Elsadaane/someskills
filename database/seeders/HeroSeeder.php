<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hero::create([
            'title_ar'=>'مزون للتصميم والبرمجة',
            'title_en'=>'Mazon Software',
            'subtitle_ar'=>'شركة رائدة في مجال البرمجة',
            'subtitle_en'=>'Company for programmer',
            'image'=>asset('about/677522bc00ad9png'),
            'video'=>'https://www.youtube.com/watch?v=NrmMk1Myrxc',
            'link'=>'https://www.mazoonsoft.com/',

        ]);
    }
}