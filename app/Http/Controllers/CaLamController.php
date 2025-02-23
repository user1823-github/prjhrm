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

    // Thêm ca làm mới
    public function store(Request $request)
    {
        $request->validate([
            'tenCa' => 'required|string|max:255',
            'gioCheckInSom' => 'required|integer|min:1',
            'gioCheckOutMuon' => 'required|integer|min:1',
        ]);

        $caLam = CaLam::create($request->all());
        return response()->json($caLam, 201);
    }

    // Lấy thông tin 1 ca làm theo ID
    public function show(CaLam $caLam)
    {
        return response()->json($caLam);
    }

    // Cập nhật ca làm
    public function update(Request $request, CaLam $caLam)
    {
        $request->validate([
            'tenCa' => 'sometimes|required|string|max:255',
            'gioCheckInSom' => 'sometimes|required|integer|min:1',
            'gioCheckOutMuon' => 'sometimes|required|integer|min:1',
        ]);

        $caLam->update($request->all());
        return response()->json($caLam);
    }

    // Xóa ca làm
    public function destroy(CaLam $caLam)
    {
        $caLam->delete();
        return response()->json(['message' => 'Xóa ca làm thành công'], 204);
    }
}
