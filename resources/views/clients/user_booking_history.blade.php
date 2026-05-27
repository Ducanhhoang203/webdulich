@include('clients.blocks.header')

<style>/* ==================================
   1. Phong cách chung cho Bảng
 /* ==================================
   1. Phong cách Bảng Tổng thể
   ================================== */
.table-container {
    /* Đảm bảo bảng được căn chỉnh đẹp */

    padding: 15px;
    background-color: #ffffff; /* Nền trắng cho container */
    border-radius: 8px; /* Bo góc nhẹ */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* Đổ bóng nhẹ và sâu */
    margin-top: 30px;
    margin-bottom: 30px;
    overflow-x: auto; /* Quan trọng cho responsive trên thiết bị nhỏ */
}

.table {
    margin-left: 50px;
    margin-top: 50px;
   padding-right: 50px;
    margin-bottom: 50px;
    width: 98%;
    border-collapse: separate; /* Thay đổi từ collapse để hỗ trợ border-radius tốt hơn */
    border-spacing: 0;
    font-size: 15px;
    min-width: 700px; /* Đảm bảo bảng không quá hẹp trên desktop */
}

/* ==================================
   2. Phong cách cho Header (<thead>)
   ================================== */
.table thead th {
    background-color: #007bff; /* Màu chủ đạo: Xanh dương */
    color: #ffffff; /* Chữ trắng */
    text-align: left;
    padding: 14px 18px;
    font-weight: 600; /* Hơi đậm */
    border: none; /* Loại bỏ viền thừa */
    letter-spacing: 0.5px; /* Tăng khoảng cách chữ nhẹ */
}

/* Bo góc cho tiêu đề */
.table thead tr th:first-child {
    border-top-left-radius: 8px;
}
.table thead tr th:last-child {
    border-top-right-radius: 8px;
}

/* Căn giữa cột # */
.table thead th:first-child {
    text-align: center;
    width: 5%;
}

/* Căn phải cho cột Tổng tiền */
.table thead th:nth-last-child(2) {
    text-align: right;
    width: 15%;
}


/* ==================================
   3. Phong cách cho Nội dung (<tbody>)
   ================================== */
.table tbody td {
    padding: 12px 18px;
    border-bottom: 1px solid #e9ecef; /* Viền ngăn cách nhẹ */
    text-align: left;
    vertical-align: middle;
    color: #495057; /* Màu chữ xám đen */
}

/* Loại bỏ viền cuối cùng của bảng */
.table tbody tr:last-child td {
    border-bottom: none;
}

/* Hiệu ứng di chuột (Hover Effect) */
.table tbody tr:hover {
    background-color: #f8f9fa; /* Màu xám rất nhạt khi di chuột */
    transition: background-color 0.2s ease;
    box-shadow: 0 1px 6px rgba(0, 0, 0, 0.05); /* Bóng nhẹ khi hover */
}

/* Căn giữa cột # */
.table tbody td:first-child {
    text-align: center;
    font-weight: 500;
}

/* Nổi bật cột Tour */
.table tbody td:nth-child(2) {
    font-weight: 600;
    color: #007bff;
}

/* Nổi bật cột Tổng tiền */
.table tbody td:nth-last-child(3) {
    text-align: right;
    font-weight: bold;
    color: #28a745; /* Màu xanh lá cây (tiền) */
}

/* ==================================
   4. Tối ưu hóa Trạng thái (Colors for Status)
   ================================== */
.status-pending { /* Chờ xác nhận */
    color: #ffc107; /* Vàng */
    font-weight: bold;
}
.status-confirmed { /* Đã xác nhận */
    color: #28a745; /* Xanh lá */
    font-weight: bold;
}
.status-cancelled { /* Đã hủy */
    color: #dc3545; /* Đỏ */
    font-weight: bold;
}
.status-completed { /* Hoàn thành */
    color: #17a2b8; /* Xanh ngọc */
    font-weight: bold;
}
.canchinhphantrang{
    margin-bottom: 30px;
}

/* ==================================
   5. Responsive (Cho màn hình nhỏ)
   ================================== */
/* Vẫn sử dụng Responsive CSS cũ, nhưng đặt bảng vào container */
@media screen and (max-width: 768px) {
    /* Ẩn tiêu đề bảng */
    .table thead {
        display: none;
    }

    /* Chuyển <tr> thành khối để xếp chồng các hàng */
    .table, .table tbody, .table tr, .table td {
        display: block;
        width: 100%;
        min-width: unset; /* Bỏ giới hạn min-width cho responsive */
    }

    /* Phong cách cho từng ô (cell) */
    .table tbody tr {
        margin-bottom: 12px;
        border: 1px solid #e9ecef;
        border-radius: 6px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .table tbody td {
        text-align: right !important;
        border: none;
        position: relative;
        padding-left: 50% !important;
    }

    /* Thêm tiêu đề ảo (Virtual Headings) */
    .table tbody td::before {
        content: attr(data-label);
        position: absolute;
        left: 15px;
        width: calc(50% - 30px);
        padding-right: 10px;
        white-space: nowrap;
        text-align: left;
        font-weight: 600; /* Hơi đậm hơn */
        color: #6c757d;
    }
}</style>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Tour</th>
            <th>Ngày đi</th>
            <th>Người lớn</th>
            <th>Trẻ em</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Hành động</th> <!-- Cột mới -->
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->booking_id }}</td>
            <td>{{ $booking->product->product_name ?? 'N/A' }}</td>
            <td>{{ $booking->start_date }}</td>
            <td>{{ $booking->adult }}</td>
            <td>{{ $booking->child }}</td>
            <td>{{ number_format($booking->total_price, 0, ',', '.') }} VNĐ</td>
            <td>
                <span class="status-{{ $booking->status }}">
                    {{ $statusMap[$booking->status] }}
                </span>
            </td>
            <td>
                @if($booking->status !== 'cancelled')
                    <form action="{{ route('bookinguser.cancel', $booking->booking_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT') {{-- Hoặc PATCH nếu route của bạn dùng --}}
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Bạn có chắc muốn hủy booking này?');">
                            Hủy
                        </button>
                    </form>
                @else
                    <span>Đã hủy</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="canchinhphantrang">
    {{ $bookings->links('pagination::bootstrap-4') }}
</div>

@include('clients.blocks.footer')