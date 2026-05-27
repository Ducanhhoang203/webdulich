<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiscountCode;

class DiscountCodeController extends Controller
{
    public function index()
    {
        $codes = DiscountCode::paginate(10); // 10 bản ghi trên mỗi trang

        return view('admin.discount.index', compact('codes'));
    }

    public function create()
    {
        return view('admin.discount.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:discount_codes,code',
            'percent' => 'required|integer|min:1|max:100',
            'expire_date' => 'nullable|date'
        ]);

        DiscountCode::create($request->all());

        // 🔥 Sửa lại route đúng
        return redirect()->route('discount.index')
                         ->with('success', 'Tạo mã giảm giá thành công!');
    }

    public function edit(DiscountCode $discount)
    {
        return view('admin.discount.edit', compact('discount'));
    }

    public function update(Request $request, DiscountCode $discount)
    {
        $request->validate([
            'code' => 'required|unique:discount_codes,code,' . $discount->id,
            'percent' => 'required|integer|min:1|max:100',
            'expire_date' => 'nullable|date'
        ]);

        $discount->update($request->all());

        // 🔥 Sửa lại route đúng
        return redirect()->route('discount.index')
                         ->with('success', 'Cập nhật mã giảm giá thành công!');
    }

    public function destroy(DiscountCode $discount)
    {
        $discount->delete();

        // 🔥 Sửa lại route đúng
        return redirect()->route('discount.index')
                         ->with('success', 'Xóa mã giảm giá thành công!');
    }
}
