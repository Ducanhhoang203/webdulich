{{-- resources/views/admin/discount/form.blade.php --}}

@include('layoutadmin')

@section('admin_content')
<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ isset($discount) ? 'Sửa' : 'Thêm' }} mã giảm giá</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="close-link"><a><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                    @php
                        $message = Session::get('message');
                    @endphp
                    @if($message)
                        <span class="text-alert" style="color: green; font-weight: bold;">{{ $message }}</span>
                        @php Session::put('message', null); @endphp
                    @endif
                </div>

                <div class="x_content">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ isset($discount) ? route('discount.update', $discount->id) : route('discount.store') }}" method="POST" class="form-horizontal form-label-left">
                        @csrf
                        @if(isset($discount))
                            @method('PUT')
                        @endif

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Mã giảm giá <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="code" class="form-control" value="{{ $discount->code ?? old('code') }}" required>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Phần trăm giảm (%) <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="percent" class="form-control" value="{{ $discount->percent ?? old('percent') }}" min="1" max="100" required>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Ngày hết hạn</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="date" name="expire_date" class="form-control" value="{{ $discount->expire_date ?? old('expire_date') }}">
                            </div>
                        </div>

                

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-success">{{ isset($discount) ? 'Cập nhật' : 'Thêm' }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

