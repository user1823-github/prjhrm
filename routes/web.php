<?php

use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\TaiKhoanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('/employee', function () {
    return view('Admin.pages.Employee.index');
})->name('quanlynhanvien');

Route::get('/notification', function () {
    return view('Admin.pages.Notification.index');
})->name('quanlythongbao');


// Api nhân viên
Route::prefix('api/nhanvien')->group(function () {
    Route::get('/', [NhanVienController::class, 'index']); // Lấy danh sách nhân viên
    Route::post('/', [NhanVienController::class, 'store']); // Thêm nhân viên
    Route::get('/{id}', [NhanVienController::class, 'show']); // Lấy 1 nhân viên
    Route::put('/{id}', [NhanVienController::class, 'update']); // Cập nhật nhân viên
    Route::delete('/{id}', [NhanVienController::class, 'destroy']); // Xóa nhân viên
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
