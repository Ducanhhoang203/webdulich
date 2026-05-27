<?php

namespace App\Http\Controllers;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product; // Đảm bảo bạn sử dụng Model Product (nếu có)

class BookingController extends Controller
{
    /**
     * Hiển thị trang Thống kê và Lịch sử Booking (Dùng cho Admin/Quản lý)
     */
 public function index(Request $request)
{
    // --- PHẦN 1: THỐNG KÊ ---
    $totalAdults = Booking::sum('adult');
    $totalChildren = Booking::sum('child');
    $totalPeopleBooked = $totalAdults + $totalChildren;

    $statusStatistics = [
        'pending' => Booking::where('status', 'pending')->count(),
        'approved' => Booking::where('status', 'approved')->count(),
        'cancelled' => Booking::where('status', 'cancelled')->count(),
    ];

    // 🟢 Tổng doanh thu chỉ tính booking đã duyệt
    $totalRevenue = Booking::where('status', 'approved')->sum('total_price');


    // --- PHẦN 2: LỌC & TÌM KIẾM LỊCH SỬ BOOKING ---
    $query = Booking::with('user');


    // 🔍 Tìm theo keyword (tên / email khách / ID booking)
    if ($request->keyword) {
        $query->where(function ($q) use ($request) {
            $q->where('booking_id', $request->keyword)
              ->orWhereHas('user', function ($u) use ($request) {
                  $u->where('name', 'LIKE', '%' . $request->keyword . '%')
                    ->orWhere('email', 'LIKE', '%' . $request->keyword . '%');
              });
        });
    }


    // 🔵 Lọc trạng thái
    if ($request->status) {
        $query->where('status', $request->status);
    }


    // 📅 Lọc ngày đi từ
    if ($request->start_date_from) {
        $query->where('start_date', '>=', $request->start_date_from);
    }

    // 📅 Lọc ngày đi đến
    if ($request->start_date_to) {
        $query->where('start_date', '<=', $request->start_date_to);
    }


    // Lấy danh sách booking sau lọc
    $bookings = $query->orderBy('created_at', 'desc')->paginate(10);


    // Map trạng thái
    $statusMap = [
        'pending'   => 'Đang xử lý',
        'approved'  => 'Đã duyệt',
        'cancelled' => 'Hủy',
    ];

    $title = "Quản lý Booking & Thống kê";

    // Trả dữ liệu cho View
    return view('admin.all_booking', [
        'totalPeopleBooked' => $totalPeopleBooked,
        'totalRevenue'      => $totalRevenue,
        'statusStatistics'  => $statusStatistics,
        'bookings'          => $bookings,
        'statusMap'         => $statusMap,
        'title'             => $title,
    ]);
}



    /**
     * Duyệt (Approved) đơn hàng
     */
    public function approve($id)
    {
        $booking = Booking::findOrFail($id);
        
        // Chỉ cho phép duyệt nếu trạng thái đang là 'pending'
        if ($booking->status === 'pending') {
            $booking->status = 'approved';
            $booking->save();
            return back()->with('success', 'Đơn hàng #' . $id . ' đã được duyệt thành công.');
        }

        return back()->with('error', 'Không thể duyệt đơn hàng này.');
    }

    /**
     * Hủy (Cancel) đơn hàng
     */
    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);

        // Chỉ cho phép hủy nếu trạng thái chưa phải là 'cancelled'
        if ($booking->status !== 'cancelled') {
            $booking->status = 'cancelled';
            $booking->save();
            return back()->with('success', 'Đơn hàng #' . $id . ' đã được hủy thành công.');
        }

        return back()->with('error', 'Đơn hàng đã bị hủy trước đó.');
    }

    /**
     * Lưu thông tin đặt tour vào cơ sở dữ liệu (Hàm gốc của bạn)
     */
   public function store(Request $request, $product_id)
{
    // --- Bước 1: Xác thực dữ liệu từ form ---
    $validated = $request->validate([
        'start_date'    => 'required|date',
        'time'          => 'required|string',
        'adult'         => 'required|integer|min:0',
        'child'         => 'required|integer|min:0',
        'total_price'   => 'required|string', // form gửi có ký tự $ hoặc VNĐ
        'AddExtra'      => 'nullable|string',
    ]);

    // --- Bước 2: Làm sạch tổng tiền ---
// Làm sạch tổng tiền từ input
$rawPrice = $validated['total_price']; // vd: "13.000.000 VNĐ"

// Xóa tất cả ký tự không phải số
$totalPrice = floatval(preg_replace('/[^\d]/', '', $rawPrice)); // "13000000" -> 13000000


    // --- Bước 3: Tạo bản ghi mới trong bảng bookings ---
    $booking = Booking::create([
        'product_id'    => $product_id,
        'user_id'       => Auth::id(), // user hiện đang đăng nhập
        'start_date'    => $validated['start_date'],
        'time'          => $validated['time'],
        'adult'         => $validated['adult'],
        'child'         => $validated['child'],
        'extra_option'  => $validated['AddExtra'] ?? null,
        'total_price'   => $totalPrice,
        'status'        => 'pending', // Gán trạng thái mặc định là 'pending'
    ]);

    // --- Bước 4: Lưu dữ liệu cần thiết vào session để sang checkout ---
    session([
        'checkout' => [
            'booking_id' => $booking->booking_id,
            'product_id' => $booking->product_id,
            'adult'      => $booking->adult,
            'child'      => $booking->child,
            'extra'      => $booking->extra_option,
            'total'      => $booking->total_price,
            'start_date' => $booking->start_date,
            'time'       => $booking->time,
        ]
    ]);

    // --- Bước 5: Chuyển hướng sang trang checkout ---
    return redirect()->route('booking.checkout', $booking->booking_id);
}


    /**
     * Trang xác nhận và thanh toán tour (Hàm gốc của bạn)
     */
  public function checkout($id)
{
    // --- Lấy thông tin booking ---
    $booking = Booking::findOrFail($id);

    // --- Lấy thông tin product ---
    $product = DB::table('tbl_product')->where('product_id', $booking->product_id)->first();

    // --- Lấy các mã giảm giá còn hạn ---
    $discountCodes = DiscountCode::whereNull('expire_date')
        ->orWhere('expire_date', '>=', now())
        ->get()
        ->mapWithKeys(function($item) {
            return [strtoupper($item->code) => $item->percent];
        });

    // --- Tạo mảng checkout để đưa sang Blade ---
    $checkout = [
        'booking_id' => $booking->booking_id,
        'product_id' => $booking->product_id,
        'adult'      => $booking->adult,
        'child'      => $booking->child,
        'extra'      => $booking->extra_option,
        'total'      => $booking->total_price,
        'start_date' => $booking->start_date,
        'time'       => $booking->time,
    ];

    $title = "Xác nhận & Thanh toán Tour";

    // --- Trả về view ---
    return view('clients.checkout', compact('booking', 'product', 'checkout', 'title', 'discountCodes'));
}

    /**
     * Hàm indexwating (Hàm gốc của bạn)
     */
    public function indexwating()
    {
        return view('clients.offline-waiting');
    }
    public function userHistory()
{
    // Lấy user hiện đang đăng nhập
    $userId = Auth::id();

    // Lấy booking của user này, sắp xếp mới nhất trước
    $bookings = Booking::with('product') // nếu muốn lấy thông tin tour
                        ->where('user_id', $userId)
                        ->orderBy('created_at', 'desc')
                        ->paginate(10); 

    $statusMap = [
        'pending'   => 'Đang xử lý',
        'approved'  => 'Đã duyệt',
        'cancelled' => 'Hủy',
    ];

    $title = "Lịch sử Booking của tôi";

    return view('clients.user_booking_history', compact('bookings', 'statusMap', 'title'));
}

    public function canceluser($id)
{
    $booking = Booking::findOrFail($id);

    if ($booking->status !== 'cancelled') {
        $booking->status = 'cancelled';
        $booking->save();

        return back()->with('success', "Đơn hàng #{$id} đã được hủy thành công.");
    }

    return back()->with('error', "Đơn hàng #{$id} đã bị hủy trước đó.");
}





}