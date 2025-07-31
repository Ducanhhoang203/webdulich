<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('Baiviet_title');
        $table->string('Baiviet_slug')->unique();
        $table->text('Baiviet_content');
        $table->text('Baiviet_excerpt')->nullable();
        $table->string('Baiviet_category')->nullable();
        $table->string('Baiviet_image_main')->nullable();
        $table->string('Baiviet_image_extra1')->nullable();
        $table->string('Baiviet_image_extra2')->nullable();
        $table->string('Baiviet_author');
        $table->integer('Baiviet_status');
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
