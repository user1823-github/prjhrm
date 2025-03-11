<?php

namespace App\Http\Controllers;

use App\Models\ThongBao;
use Illuminate\Http\Request;

class ThongBaoController extends Controller
{
    /**
     * Lấy danh sách tất cả thông báo
     */
    public function index()
    {
        return response()->json(ThongBao::all(), 200);
    }

    /**
     * Lưu một thông báo mới vào database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tieuDe' => 'required|string|max:255',
            'url' => 'required|url',
            'tgBatDau' => 'required|date',
            'tgKetThuc' => 'required|date|after:tgBatDau',
        ]);

        $thongBao = ThongBao::create($validated);

        return response()->json([
            'message' => 'Thông báo đã được thêm thành công!',
            'data' => $thongBao
        ], 201);
    }

    /**
     * Lấy chi tiết một thông báo
     */
    public function show($id)
    {
        $thongBao = ThongBao::find($id);

        if (!$thongBao) {
            return response()->json(['message' => 'Không tìm thấy thông báo'], 404);
        }

        return response()->json($thongBao, 200);
    }

    /**
     * Cập nhật thông báo
     */
    public function update(Request $request, $id)
    {
        $thongBao = ThongBao::find($id);

        if (!$thongBao) {
            return response()->json(['message' => 'Không tìm thấy thông báo'], 404);
        }

        $request->validate([
            'tieuDe' => 'sometimes|string|max:255',
            'URL' => 'nullable|string|max:255',
            'tgBatDau' => 'sometimes|date',
            'tgKetThuc' => 'sometimes|date|after_or_equal:tgBatDau',
        ]);

        $thongBao->update($request->all());

        return response()->json($thongBao, 200);
    }

    /**
     * Xóa thông báo
     */
    public function destroy($id)
    {
        $thongBao = ThongBao::find($id);

        if (!$thongBao) {
            return response()->json(['message' => 'Không tìm thấy thông báo'], 404);
        }

        $thongBao->delete();

        return response()->json(['message' => 'Xóa thông báo thành công'], 200);
    }
}
