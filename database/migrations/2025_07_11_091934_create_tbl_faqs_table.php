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
        Schema::create('tbl_faqs', function (Blueprint $table) {
            $table->increments('faqs_id');
            $table->integer('product_id');
            $table->string('faqs_question');
            $table->text('faqs_answer');
            $table->integer('faqs_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_faqs');
    }
};
