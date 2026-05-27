<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            // product_id phải match kiểu INT UNSIGNED
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')
                  ->references('product_id')
                  ->on('tbl_product')
                  ->onDelete('cascade');

            // user_id là BIGINT UNSIGNED vì usernguoidung.id là BIGINT
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('usernguoidung')
                  ->onDelete('set null');

            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->text('message');

            $table->tinyInteger('service_rating')->default(0);
            $table->tinyInteger('guide_rating')->default(0);
            $table->tinyInteger('price_rating')->default(0);
            $table->tinyInteger('safety_rating')->default(0);
            $table->tinyInteger('food_rating')->default(0);
            $table->tinyInteger('hotel_rating')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

