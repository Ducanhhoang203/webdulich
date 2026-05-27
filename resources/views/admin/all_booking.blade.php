@include('layoutadmin') {{-- Giữ nguyên cú pháp @include của bạn --}}
@section('admin_content')

<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quản Lý Booking & Thống Kê <small>Lịch sử đặt tour</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <br />
                    
                    {{-- Hiển thị thông báo (Sử dụng cú pháp Laravel Blade hiện đại hơn) --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                    @endif
                </div>

                <div class="x_content">
                       <form method="GET" action="{{ URL::to('/admin/bookings') }}" class="mb-4">

        <div class="row">

            {{-- Từ khóa tìm kiếm --}}
            <div class="col-md-4 mb-2">
                <input type="text" name="keyword" value="{{ request('keyword') }}"
                    class="form-control" placeholder="Tìm theo tên khách, email hoặc ID booking...">
            </div>

            {{-- Lọc trạng thái --}}
            <div class="col-md-3 mb-2">
                <select name="status" class="form-control">
                    <option value="">-- Trạng thái --</option>
                    <option value="pending" {{ request('status')=='pending' ? 'selected' : '' }}>Đang xử lý</option>
                    <option value="approved" {{ request('status')=='approved' ? 'selected' : '' }}>Đã duyệt</option>
                    <option value="cancelled" {{ request('status')=='cancelled' ? 'selected' : '' }}>Đã huỷ</option>
                </select>
            </div>

            {{-- Lọc theo ngày đi từ --}}
            <div class="col-md-2 mb-2">
                <input type="date" name="start_date_from" value="{{ request('start_date_from') }}"
                    class="form-control" placeholder="Ngày đi từ">
            </div>

         

            {{-- nút lọc --}}
            <div class="col-md-2 mb-2">
                <button class="btn btn-primary btn-block">
                    <i class="fa fa-filter"></i> Lọc
                </button>
            </div>

            {{-- nút reset --}}
            <div class="col-md-2 mb-2">
                <a href="{{ URL::to('/admin/bookings') }}" class="btn btn-secondary btn-block">
                    Reset
                </a>
            </div>

        </div>
    </form>
                    {{-- === PHẦN THỐNG KÊ === --}}
                    <h3>📊 Thống Kê Tổng Quan</h3>
                    <div class="row mb-5">
                        {{-- Cột Tổng Người Đặt --}}
                        <div class="col-md-4 col-sm-4">
                            <div class="tile-stats bg-info text-white p-3 mb-3">
                                <h3>Tổng Số Người Đặt</h3>
                                <div class="count">{{ $totalPeopleBooked ?? 0 }}</div>
                                <div class="tile-stats bg-primary text-white p-3">
                                <h3>Tổng Doanh Thu</h3>
                                <div class="count">
                                    {{ number_format($totalRevenue ?? 0, 0, ',', '.') }} VNĐ
                                </div>
                            </div>
                            </div>
                            
                            {{-- Cột Tổng Doanh Thu (ĐÃ DUYỆT) --}}
                            
                        </div>
                        
                        {{-- Cột Thống kê theo trạng thái --}}
                        <div class="col-md-8 col-sm-8">
                            <div class="row">
                                <div class="col-4">
                                    <div class="tile-stats p-3 border border-warning text-warning">
                                        <h4>Đang Xử Lý</h4>
                                        <div class="count">{{ $statusStatistics['pending'] ?? 0 }}</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="tile-stats p-3 border border-success text-success">
                                        <h4>Đã Duyệt</h4>
                                        <div class="count">{{ $statusStatistics['approved'] ?? 0 }}</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="tile-stats p-3 border border-danger text-danger">
                                        <h4>Hủy</h4>
                                        <div class="count">{{ $statusStatistics['cancelled'] ?? 0 }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr>

                    {{-- === PHẦN BẢNG LỊCH SỬ BOOKING === --}}
                    <h3>📜 Lịch Sử Đặt Tour</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Tour ID</th>
                                    <th>Khách Hàng</th>
                                    <th>Ngày đi</th>
                                    <th>Người lớn/Trẻ em</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th colspan="3">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->booking_id }}</td>
                                    <td>{{ $booking->product_id }}</td> 
                                    <td>{{ $booking->user->name ?? 'Khách Vãng Lai' }}</td> 
                                    <td>{{ $booking->start_date }}</td>
                                    <td>{{ $booking->adult }} / {{ $booking->child }}</td>
                                    <td>{{ number_format($booking->total_price, 0, ',', '.') }} VNĐ</td>
                                    
                                    <td>
                                        {{-- Hiển thị trạng thái với badge --}}
                                        @php
                                            $badgeClass = match($booking->status) {
                                                'approved' => 'badge-success',
                                                'cancelled' => 'badge-danger',
                                                default => 'badge-warning', // pending
                                            };
                                        @endphp
                                        <span class="badge {{ $badgeClass }}">
                                            {{ $statusMap[$booking->status] ?? $booking->status }}
                                        </span>
                                    </td>
                                    
                                    {{-- Nút Thao tác --}}
                                   
                                    <td>
                                        {{-- Form Duyệt: Chỉ hiện khi Đang xử lý --}}
                                        @if ($booking->status == 'pending')
                                        <form action="{{ route('admin.bookings.approve', $booking->booking_id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Duyệt</button>
                                        </form>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Form Hủy: Chỉ hiện khi chưa bị Hủy --}}
                                        @if ($booking->status != 'cancelled')
                                        <form action="{{ route('admin.bookings.cancel', $booking->booking_id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn HỦY đơn hàng #{{ $booking->booking_id }}?')">Hủy</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- === PHẦN PHÂN TRANG === --}}
                    <div class="d-flex justify-content-center mt-3">
                        {{ $bookings->links('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
