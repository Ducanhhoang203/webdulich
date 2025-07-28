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
        Schema::create('tbl_faqschitiet', function (Blueprint $table) {
            $table->increments('faqs_chitiet_id');
            $table->string('faqs_chitiet_title');
            $table->string('faqs_chitiet_cauhoi');
            $table->string('faqs_chitiet_cautraloi');
            $table->integer('product_id');
            $table->integer('faqs_chitiet_status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_faqschitiet');
    }
};
