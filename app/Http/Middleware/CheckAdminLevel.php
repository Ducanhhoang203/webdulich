<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckAdminLevel
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $level  // Mức quyền tối thiểu
     * @return mixed
     */
 // Ví dụ về logic kiểm tra đúng (giả định cấp độ 0 là cao nhất)
// Trong CheckAdminLevel.php
public function handle(Request $request, Closure $next, string $requiredLevel)
{
    $admin = $request->user('admin');
    
    // Đảm bảo Level hiện tại (admin_level) nhỏ hơn HOẶC BẰNG Level yêu cầu (requiredLevel)
    // Ví dụ: requiredLevel = 0, admin_level = 0 -> OK
    // Ví dụ: requiredLevel = 0, admin_level = 1 -> BỊ CHẶN (return abort(403))
    // Ví dụ: requiredLevel = 1, admin_level = 0 -> OK (Vì 0 có thể làm được việc của 1)
    
    if ($admin && $admin->admin_level <= (int)$requiredLevel) {
        return $next($request);
    }
    
    return abort(403, 'Bạn không có quyền truy cập vào tài nguyên này.');
}

}
