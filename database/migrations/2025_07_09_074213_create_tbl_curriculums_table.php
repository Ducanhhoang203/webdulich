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
        Schema::create('tbl_curriculums', function (Blueprint $table) {
            $table->increments('curriculums_id');
            $table->integer('product_id');
            $table->string('curriculums_title');
            $table->longText('curriculums_content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_curriculums');
    }
};
