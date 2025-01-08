<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      About::truncate();
        $about = [
            'company_ar' => 'مزود خدمات الإنترنت' ,
            'company_en' => 'mazod internet services' ,
            'who_are_we_ar' => 'شركة مزود خدمات الإنترنت هي شركة تقدم خدمات الإنترنت للعملاء' ,
            'who_are_we_en' => 'company mazod internet services is a company that provides internet services to customers' ,
            'contant_ar' => 'شركة مزود خدمات الإنترنت هي شركة تقدم خدمات الإنترنت للعملاء' ,
            'contant_en' => 'shirkat mazod internet services hiya shirkat taqdm khadmat al internet lil umala' ,
            'image' => asset('logo.png'),
        ];
        About::create($about);
    }
}
