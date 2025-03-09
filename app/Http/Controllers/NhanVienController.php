<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nhanvien = NhanVien::with('taiKhoan')->get();
        return response()->json($nhanvien, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Trả về dữ liệu mẫu cho một nhân viên mới (các trường có thể để trống hoặc null)
        // return response()->json([
        //     'nhanVien' => [
        //         'hoTen'       => '',
        //         'chucDanh'    => '',
        //         'soDienThoai' => '',
        //         'email'       => '',
        //         'gioiTinh'    => '',
        //         'ngayVaoLam'  => null,
        //         'ngaySinh'    => null,
        //         'maTK'        => null,
        //     ]
        // ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Tìm nhân viên theo id, nếu không tìm thấy sẽ ném Exception 404
        $nhanVien = NhanVien::findOrFail($id);

        // Lấy dữ liệu cập nhật (chỉ cho phép cập nhật các trường này)
        $data = $request->only([
            'hoTen',
            'chucDanh',
            'ngayVaoLam',
            'soDienThoai',
            'email',
            'trangThai'
        ]);

        if (array_key_exists('trangThai', $data)) {
            $data['trangThai'] = $data['trangThai'] === "1";
        }

        // Cập nhật các trường theo dữ liệu nhận được
        $nhanVien->update($data);

        // Trả về JSON chứa thông tin nhân viên đã được cập nhật
        return response()->json($nhanVien, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nhanVien = NhanVien::findOrFail($id);

        // Xóa file icon nếu có
        if ($nhanVien->icon && File::exists(public_path($nhanVien->icon))) {
            File::delete(public_path($nhanVien->icon));
        }

        $nhanVien->delete();

        return response()->json(null, 204);
    }
}
