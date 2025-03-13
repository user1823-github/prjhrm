<?php

namespace App\Http\Controllers;

use App\Models\Luong;
use App\Models\NhanVien;
use App\Models\TaiKhoan;
use App\Models\ThanhToan;
use Carbon\Carbon;
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
            'tenTaiKhoan' => 'required|string|unique:taikhoan,tenTaiKhoan',
            'matKhau'     => 'required|string',
        ]);

        // Tạo tài khoản mới
        $taiKhoan = TaiKhoan::create([
            'tenTaiKhoan' => $request->tenTaiKhoan,
            'matKhau'     => Hash::make($request->matKhau)
        ]);

        // Lấy maLuong có sẵn (không tạo mới)
        $maLuong = Luong::inRandomOrder()->first()->maLuong;

        // Tạo luôn bản ghi nhân viên với các trường còn lại để trống và gắn maTK từ tài khoản vừa tạo
        $nhanVien = NhanVien::create([
            'hoTen'       => null,
            'chucDanh'    => null,
            'soDienThoai' => null,
            'email'       => null,
            'gioiTinh'    => null,
            'ngayVaoLam'  => Carbon::now()->toDateString(),
            'tienLuong'   => 0,
            'ngaySinh'    => null,
            'trangThai'    => 1,
            'maTK'        => $taiKhoan->maTK,
            'maLuong'        => $maLuong,
        ]);

        // Trả về JSON chứa thông tin tài khoản và nhân viên mới tạo
        return response()->json([
            'taiKhoan' => $taiKhoan,
            'nhanVien' => $nhanVien
        ], 201);
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
