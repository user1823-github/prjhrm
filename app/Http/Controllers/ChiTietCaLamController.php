<?php

namespace App\Http\Controllers;

use App\Models\ChiTietCaLam;
use Illuminate\Http\Request;

class ChiTietCaLamController extends Controller
{
    // Lấy danh sách tất cả chi tiết ca làm
    public function index()
    {
        return response()->json(ChiTietCaLam::all());
    }

    // Thêm chi tiết ca làm mới
    public function store(Request $request)
    {
        $request->validate([
            'thuTrongTuan' => 'required|integer|min:1|max:7',
            'tgBatDau' => 'required|date_format:H:i',
            'tgKetThuc' => 'required|date_format:H:i',
            'tgBatDauNghi' => 'nullable|date_format:H:i',
            'tgKetThucNghi' => 'nullable|date_format:H:i',
            'heSoLuong' => 'numeric|min:1|max:50',
            'tienThuong' => 'numeric|min:0',
            'maCL' => 'required|exists:calam,maCL' // Đảm bảo maCL tồn tại trong bảng calam
        ]);

        $chiTietCaLam = ChiTietCaLam::create($request->all());
        return response()->json($chiTietCaLam, 201);
    }

    // Lấy thông tin một chi tiết ca làm theo ID
    public function show(ChiTietCaLam $chiTietCaLam)
    {
        return response()->json($chiTietCaLam);
    }

    // Cập nhật chi tiết ca làm
    public function update(Request $request, ChiTietCaLam $chiTietCaLam)
    {
        $request->validate([
            'thuTrongTuan' => 'integer|min:1|max:7',
            'tgBatDau' => 'required|date_format:H:i',
            'tgKetThuc' => 'required|date_format:H:i',
            'tgBatDauNghi' => 'nullable|date_format:H:i',
            'tgKetThucNghi' => 'nullable|date_format:H:i',
            'heSoLuong' => 'numeric|min:1|max:50',
            'tienThuong' => 'numeric|min:0',
            'maCL' => 'required|exists:calam,maCL'
        ]);

        $chiTietCaLam->update($request->all());
        return response()->json($chiTietCaLam);
    }

    // Xóa chi tiết ca làm
    public function destroy(ChiTietCaLam $chiTietCaLam)
    {
        $chiTietCaLam->delete();
        return response()->json(['message' => 'Xóa chi tiết ca làm thành công'], 204);
    }
}
