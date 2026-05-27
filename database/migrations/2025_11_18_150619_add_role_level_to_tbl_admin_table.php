<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tbl_admin', function (Blueprint $table) {
            // Thêm cột 'admin_level' với giá trị mặc định là 0 (User/Editor cơ bản)
            // 1: Super Admin (quản lý mọi thứ), 0: Editor/User
            $table->tinyInteger('admin_level')->default(0)->after('admin_phone'); 
            
            // HOẶC: Nếu bạn muốn phân quyền phức tạp hơn, nên dùng khóa ngoại role_id
            // $table->unsignedBigInteger('role_id')->nullable()->after('admin_phone');
            // $table->foreign('role_id')->references('id')->on('roles'); 
        });
    }

    public function down(): void
    {
        Schema::table('tbl_admin', function (Blueprint $table) {
            $table->dropColumn('admin_level');
            // Nếu dùng role_id: $table->dropForeign(['role_id']); $table->dropColumn('role_id');
        });
    }
};