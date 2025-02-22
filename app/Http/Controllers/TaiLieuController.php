<?php

namespace App\Http\Controllers;

use App\Models\TaiLieu;
use Illuminate\Http\Request;

class TaiLieuController extends Controller
{
    /**
     * Lấy danh sách tất cả tài liệu
     */
    public function index()
    {
        return response()->json(TaiLieu::all(), 200);
    }

    /**
     * Lưu một tài liệu mới vào database
     */
    public function store(Request $request)
    {
        $request->validate([
            'tieuDe' => 'required|string|max:255',
            'URL' => 'nullable|string|max:255',
            'tgBatDau' => 'required|date',
            'tgKetThuc' => 'required|date|after_or_equal:tgBatDau',
        ]);

        $TaiLieu = TaiLieu::create($request->all());

        return response()->json($TaiLieu, 201);
    }

    /**
     * Lấy chi tiết một tài liệu
     */
    public function show($id)
    {
        $TaiLieu = TaiLieu::find($id);

        if (!$TaiLieu) {
            return response()->json(['message' => 'Không tìm thấy tài liệu'], 404);
        }

        return response()->json($TaiLieu, 200);
    }

    /**
     * Cập nhật tài liệu
     */
    public function update(Request $request, $id)
    {
        $TaiLieu = TaiLieu::find($id);

        if (!$TaiLieu) {
            return response()->json(['message' => 'Không tìm thấy tài liệu'], 404);
        }

        $request->validate([
            'tieuDe' => 'sometimes|string|max:255',
            'URL' => 'nullable|string|max:255',
            'tgBatDau' => 'sometimes|date',
            'tgKetThuc' => 'sometimes|date|after_or_equal:tgBatDau',
        ]);

        $TaiLieu->update($request->all());

        return response()->json($TaiLieu, 200);
    }

    /**
     * Xóa tài liệu
     */
    public function destroy($id)
    {
        $TaiLieu = TaiLieu::find($id);

        if (!$TaiLieu) {
            return response()->json(['message' => 'Không tìm thấy tài liệu'], 404);
        }

        $TaiLieu->delete();

        return response()->json(['message' => 'Xóa tài liệu thành công'], 200);
    }
}
