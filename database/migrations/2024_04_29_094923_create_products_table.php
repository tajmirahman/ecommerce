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

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');

            $table->unsignedBigInteger('childcategory_id');
            $table->foreign('childcategory_id')->references('id')->on('child_categories')->onDelete('cascade');

            $table->string('product_name');
            $table->string('product_slug')->unique();
            $table->string('sku_code', 50)->unique()->nullable();
            $table->string('mf_code', 50)->unique()->nullable();
            $table->string('product_code', 50)->nullable();
            $table->string('tags')->nullable();

            $table->json('color_id')->nullable();
            $table->longText('short_desc')->nullable();
            $table->longText('overview')->nullable();

            $table->string('product_image')->nullable();
            $table->string('qty')->nullable();
            $table->string('stock', 50)->nullable();

            $table->string('selling_price')->nullable();
            $table->string('discount_price')->nullable();

            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();

            $table->string('status')->default(1);


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
