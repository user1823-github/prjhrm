<?php

namespace App\Http\Controllers;

use App\Models\Luong;
use Illuminate\Http\Request;

class LuongController extends Controller
{
    // Lấy danh sách lương
    public function index()
    {
        return response()->json(Luong::all(), 200);
    }

    // Thêm lương mới
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kieuLuong' => 'required|string|max:255',
            'soTien' => 'required|numeric|min:0'
        ]);

        $luong = Luong::create($validated);
        return response()->json($luong, 201);
    }

    // Lấy thông tin lương theo ID
    public function show($id)
    {
        $luong = Luong::find($id);
        if (!$luong) return response()->json(['message' => 'Không tìm thấy lương'], 404);

        return response()->json($luong, 200);
    }

    // Cập nhật thông tin lương
    public function update(Request $request, $id)
    {
        $luong = Luong::find($id);
        if (!$luong) return response()->json(['message' => 'Không tìm thấy lương'], 404);

        $validated = $request->validate([
            'kieuLuong' => 'sometimes|string|max:255',
            'soTien' => 'sometimes|numeric|min:0'
        ]);

        $luong->update($validated);
        return response()->json($luong, 200);
    }

    // Xóa lương
    public function destroy($id)
    {
        $luong = Luong::find($id);
        if (!$luong) return response()->json(['message' => 'Không tìm thấy lương'], 404);

        $luong->delete();
        return response()->json(['message' => 'Xóa thành công'], 200);
    }
}
