<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TaiKhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taikhoan = TaiKhoan::all();
        return response()->json($taikhoan, 200);
    }

    // Tạo tài khoản mới
    public function store(Request $request)
    {
        $request->validate([
            'matKhau' => 'required|string',
            'quyenHan' => 'required|in:admin,user',
        ]);

        $taiKhoan = TaiKhoan::create([
            'matKhau' => Hash::make($request->matKhau), // Mã hóa mật khẩu
            'quyenHan' => $request->quyenHan,
        ]);

        return response()->json($taiKhoan, 201);
    }

    // Lấy thông tin 1 tài khoản
    public function show($id)
    {
        $taiKhoan = TaiKhoan::find($id);
        if (!$taiKhoan) {
            return response()->json(['message' => 'Không tìm thấy tài khoản'], 404);
        }
        return response()->json($taiKhoan, 200);
    }

    // Cập nhật tài khoản
    public function update(Request $request, $id)
    {
        $taiKhoan = TaiKhoan::find($id);
        if (!$taiKhoan) {
            return response()->json(['message' => 'Không tìm thấy tài khoản'], 404);
        }

        $taiKhoan->update([
            'quyenHan' => $request->quyenHan ?? $taiKhoan->quyenHan,
            'matKhau' => $request->matKhau ? Hash::make($request->matKhau) : $taiKhoan->matKhau,
        ]);

        return response()->json($taiKhoan, 200);
    }

    // Xóa tài khoản
    public function destroy($id)
    {
        $taiKhoan = TaiKhoan::find($id);
        if (!$taiKhoan) {
            return response()->json(['message' => 'Không tìm thấy tài khoản'], 404);
        }

        $taiKhoan->delete();
        return response()->json(['message' => 'Đã xóa tài khoản'], 200);
    }
}
