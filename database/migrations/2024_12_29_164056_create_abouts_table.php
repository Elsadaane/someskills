<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('company_ar');
            $table->string('company_en');
            $table->string('who_are_we_ar');
            $table->string('who_are_we_en');
            $table->string('contant_ar');
            $table->string('contant_en');
            $table->string('image')->nullable()->default(asset('assets/default-featured-image.png'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};