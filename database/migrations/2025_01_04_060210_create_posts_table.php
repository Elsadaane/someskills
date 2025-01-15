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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('posts_category_id');
            $table->unsignedBigInteger('user_id')->nullable(); ;
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('writer_id')->nullable(); ;
            $table->foreign('writer_id')->references('id')->on('writers')->cascadeOnDelete();
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('slug')->nullable();
            $table->string('image')->default(asset('default-featured-image.png'));
            $table->text('content_ar');
            $table->text('content_en');
            $table->string('user_type');
            $table->string('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
