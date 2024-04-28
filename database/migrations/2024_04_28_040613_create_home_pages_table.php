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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();

            $table->enum('status', ['lookone', 'looktwo','lookthree'])->default('lookone');

            $table->string('video_slider_one_title')->nullable();
            $table->string('video_slider_one_sub_title')->nullable();
            $table->text('video_slider_one_video')->nullable();

            $table->string('video_slider_two_title')->nullable();
            $table->string('video_slider_two_sub_title')->nullable();
            $table->text('video_slider_two_video')->nullable();

            $table->string('image_slider_one_header')->nullable();
            $table->string('image_slider_one_badge')->nullable();
            $table->string('image_slider_one_title')->nullable();
            $table->string('image_slider_one_sub_title')->nullable();
            $table->text('image_slider_one_description')->nullable();
            $table->string('image_slider_one_button_name')->nullable();
            $table->text('image_slider_one_button_link')->nullable();

            $table->string('image_slider_two_header')->nullable();
            $table->string('image_slider_two_badge')->nullable();
            $table->string('image_slider_two_title')->nullable();
            $table->string('image_slider_two_sub_title')->nullable();
            $table->text('image_slider_two_description')->nullable();
            $table->string('image_slider_two_button_name')->nullable();
            $table->text('image_slider_two_button_link')->nullable();

            $table->string('image_slider_three_header')->nullable();
            $table->string('image_slider_three_badge')->nullable();
            $table->string('image_slider_three_title')->nullable();
            $table->string('image_slider_three_sub_title')->nullable();
            $table->text('image_slider_three_description')->nullable();
            $table->string('image_slider_three_button_name')->nullable();
            $table->text('image_slider_three_button_link')->nullable();

            $table->string('category_tab_one_id')->nullable();
            $table->string('category_tab_two_id')->nullable();
            $table->string('category_tab_three_id')->nullable();
            $table->string('category_tab_four_id')->nullable();

            $table->text('background_image_title')->nullable();

            $table->string('background_image_button_name')->nullable();
            $table->text('background_image_button_link')->nullable();
            $table->string('background_image_sub_title')->nullable();

            $table->text('background_image_one_image')->nullable()->comment('Dimensions: 1920 x 840 pixels');
            $table->text('background_image_two_image')->nullable()->comment('Dimensions: 1920 x 840 pixels');
            $table->text('background_image_three_image')->nullable()->comment('Dimensions: 1920 x 840 pixels');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
