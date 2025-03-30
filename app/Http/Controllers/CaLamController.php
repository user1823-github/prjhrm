<?php

namespace App\Http\Controllers;

use App\Models\CaLam;
use Illuminate\Http\Request;

class CaLamController extends Controller
{
    // Lấy danh sách tất cả ca làm
    public function index()
    {
        return response()->json(CaLam::all());
    }

    // Lấy chi tiết của một ca làm theo maCL
    public function getChiTietCaLam($maCL)
    {
        $caLam = CaLam::with('chiTietCaLams')->find($maCL);

        if (!$caLam) {
            return response()->json(['message' => 'Ca làm không tồn tại'], 404);
        }

        return response()->json($caLam, 200);
    }

    // Thêm ca làm mới
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tenCa' => 'required|string|max:255',
            'gioCheckInSom' => 'required|integer|min:0',
            'gioCheckOutMuon' => 'required|integer|min:0',
        ]);

        $caLam = CaLam::create($validated);
        return response()->json($caLam, 201);
    }

    // Lấy thông tin 1 ca làm theo ID
    public function show(string $id)
    {
        $caLam = CaLam::findOrFail($id);
        return response()->json($caLam, 200);
    }

    // Cập nhật ca làm
    public function update(Request $request, string $id)
    {
        $caLam = CaLam::findOrFail($id);

        // $request->validate([
        //     'tenCa' => 'required|string|max:255',
        //     'gioCheckInSom' => 'required|integer|min:1',
        //     'gioCheckOutMuon' => 'required|integer|min:1',
        // ]);

        $data = $request->only([
            'tenCa',
            'gioCheckInSom',
            'gioCheckOutMuon',
        ]);

        $caLam->update($data);
        return response()->json($caLam, 200);
    }

    // Xóa ca làm
    public function destroy(string $id)
    {
        $caLam = CaLam::findOrFail($id);
        $caLam->delete();
        return response()->json(['message' => 'Xóa ca làm thành công'], 204);
    }
}
