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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_product_id');
            $table->string('product_name_ar');
            $table->string('product_name_en');
            $table->string('slug')->nullable();
            $table->float('Price_after_discount');
            $table->float('Price_before_discount');
            $table->string('image')->default(asset('default-featured-image.png'));;
            $table->string('Product_Description_ar');
            $table->string('Product_Description_en');
            $table->string('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};