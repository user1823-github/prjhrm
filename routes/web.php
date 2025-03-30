<?php

use App\Http\Controllers\CaLamController;
use App\Http\Controllers\ChiTietCaLamController;
use App\Http\Controllers\HopThoaiController;
use App\Http\Controllers\LichLamViecController;
use App\Http\Controllers\LuongController;
use App\Http\Controllers\NgayLeController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\TaiLieuController;
use App\Http\Controllers\ThanhToanController;
use App\Http\Controllers\ThongBaoController;
use App\Models\ChiTietCaLam;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::prefix('admin')->group(function () {
    Route::get('/employee', function () {
        return view('Admin.pages.Employee.index');
    })->name('quanlynhanvien');

    Route::get('/notification', function () {
        return view('Admin.pages.Notification.index');
    })->name('quanlythongbao');

    Route::get('/workschedule', function () {
        return view('Admin.pages.TimeKeeping.QLCaLam.index');
    })->name('lichlamviec');

    Route::get('/timesheet', function () {
        return view('Admin.pages.TimeKeeping.QLChamCong.index');
    })->name('bangchamcong');

    Route::get('/leave', function () {
        return view('Admin.pages.TimeKeeping.QLPhep.index');
    })->name('donphep');
});



// Api nhân viên
Route::prefix('api/nhanvien')->group(function () {
    Route::get('/', [NhanVienController::class, 'index']); // Lấy danh sách nhân viên
    Route::post('/', [NhanVienController::class, 'store']); // Thêm nhân viên
    Route::get('/{id}', [NhanVienController::class, 'show']); // Lấy 1 nhân viên
    Route::put('/{id}', [NhanVienController::class, 'update']); // Cập nhật nhân viên
    Route::delete('/{id}', [NhanVienController::class, 'destroy']); // Xóa nhân viên
});

// Api Lương
Route::prefix('api/luong')->group(function () {
    Route::get('/', [LuongController::class, 'index']); // Lấy danh sách nhân viên
    Route::post('/', [LuongController::class, 'store']); // Thêm nhân viên
    Route::get('/{id}', [LuongController::class, 'show']); // Lấy 1 nhân viên
    Route::put('/{id}', [LuongController::class, 'update']); // Cập nhật nhân viên
    Route::delete('/{id}', [LuongController::class, 'destroy']); // Xóa nhân viên
});

// Api Thanh toán
Route::prefix('api/thanhtoan')->group(function () {
    Route::get('/', [ThanhToanController::class, 'index']); // Lấy danh sách nhân viên
    Route::post('/', [ThanhToanController::class, 'store']); // Thêm nhân viên
    Route::get('/{id}', [ThanhToanController::class, 'show']); // Lấy 1 nhân viên
    Route::put('/{id}', [ThanhToanController::class, 'update']); // Cập nhật nhân viên
    Route::delete('/{id}', [ThanhToanController::class, 'destroy']); // Xóa nhân viên
});

// Route::apiResource('nhanvien', NhanVienController::class);

// Api tài khoản
Route::prefix('api/taikhoan')->group(function () {
    Route::get('/', [TaiKhoanController::class, 'index']);
    Route::post('/', [TaiKhoanController::class, 'store']);
    Route::get('/{id}', [TaiKhoanController::class, 'show']);
    Route::put('/{id}', [TaiKhoanController::class, 'update']);
    Route::delete('/{id}', [TaiKhoanController::class, 'destroy']);
});



// Api hộp thoại
Route::prefix('api/hopthoai')->group(function () {
    Route::get('/', [HopThoaiController::class, 'index']);
    Route::post('/', [HopThoaiController::class, 'store']);
    Route::get('/{id}', [HopThoaiController::class, 'show']);
    Route::put('/{id}', [HopThoaiController::class, 'update']);
    Route::delete('/{id}', [HopThoaiController::class, 'destroy']);
});

// Api thông báo
Route::prefix('api/thongbao')->group(function () {
    Route::get('/', [ThongBaoController::class, 'index']);
    Route::post('/', [ThongBaoController::class, 'store']);
    Route::get('/{id}', [ThongBaoController::class, 'show']);
    Route::put('/{id}', [ThongBaoController::class, 'update']);
    Route::delete('/{id}', [ThongBaoController::class, 'destroy']);
});

// Api tài liệu
Route::prefix('api/tailieu')->group(function () {
    Route::get('/', [TaiLieuController::class, 'index']);
    Route::post('/', [TaiLieuController::class, 'store']);
    Route::get('/{id}', [TaiLieuController::class, 'show']);
    Route::put('/{id}', [TaiLieuController::class, 'update']);
    Route::delete('/{id}', [TaiLieuController::class, 'destroy']);
});

// Api Ca làm
Route::prefix('api/calam')->group(function () {
    Route::get('/', [CaLamController::class, 'index']);
    Route::get('/{maCL}/chitiet', [CaLamController::class, 'getChiTietCaLam']); // Lấy chi tiết ca làm theo maCL
    Route::post('/', [CaLamController::class, 'store']);
    Route::get('/{id}', [CaLamController::class, 'show']);
    Route::put('/{id}', [CaLamController::class, 'update']);
    Route::delete('/{id}', [CaLamController::class, 'destroy']);
});

// Api Chi tiết ca làm
Route::prefix('api/chitietcalam')->group(function () {
    Route::get('/', [ChiTietCaLamController::class, 'index']);
    Route::post('/', [ChiTietCaLamController::class, 'store']);
    Route::get('/{id}', [ChiTietCaLamController::class, 'show']);
    Route::put('/{id}', [ChiTietCaLamController::class, 'update']);
    Route::delete('/{id}', [ChiTietCaLamController::class, 'destroy']);
});

// Api Ngày lễ
Route::prefix('api/ngayle')->group(function () {
    Route::get('/', [NgayLeController::class, 'index']);
    Route::post('/', [NgayLeController::class, 'store']);
    Route::get('/{id}', [NgayLeController::class, 'show']);
    Route::put('/{id}', [NgayLeController::class, 'update']);
    Route::delete('/{id}', [NgayLeController::class, 'destroy']);
});

// Api Lịch làm việc
Route::prefix('api/lichlamviec')->group(function () {
    Route::get('/', [LichLamViecController::class, 'index']);
    Route::post('/', [LichLamViecController::class, 'store']);
    Route::get('/{id}', [LichLamViecController::class, 'show']);
    Route::put('/{id}', [LichLamViecController::class, 'update']);
    Route::delete('/{id}', [LichLamViecController::class, 'destroy']);
});
