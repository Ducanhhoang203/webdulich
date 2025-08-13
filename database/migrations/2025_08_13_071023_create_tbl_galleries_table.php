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
        Schema::create('tbl_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('image_path'); // đường dẫn hình ảnh
            $table->string('alt_text')->nullable(); // alt text cho SEO
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_galleries');
    }
};
