<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tbl_booking', function (Blueprint $table) {
            // Thêm cột 'status' là string, giá trị mặc định là 'pending' (Đang xử lý)
            // Đặt sau cột 'total_price'
            $table->string('status', 20)->default('pending')->after('total_price'); 
            
        });
    }

    public function down(): void
    {
        Schema::table('tbl_booking', function (Blueprint $table) {
            // Khi rollback, xóa cột 'status'
            $table->dropColumn('status');
        });
    }
};