<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('tbl_banner', function (Blueprint $table) {
            $table->id();
            $table->string('tile_baner');
            $table->string('image');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('tbl_banner');
    }
};
