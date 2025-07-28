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
        Schema::create('tbl_instructors', function (Blueprint $table) {
            $table->increments('instructors_id');
            $table->string('instructors_name');
            $table->string('instructors_bio');
            $table->string('instructors_image');
            $table->string('product_id');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_instructors');
    }
};
