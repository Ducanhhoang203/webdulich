<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_booking', function (Blueprint $table) {
            $table->id('booking_id');
            $table->unsignedInteger('product_id'); // tour được đặt
            $table->unsignedBigInteger('user_id')->nullable(); // nếu đăng nhập
            $table->date('start_date');
            $table->string('time');
            $table->integer('adult')->default(0);
            $table->integer('child')->default(0);
            $table->string('extra_option')->nullable();
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_booking');
    }
};
