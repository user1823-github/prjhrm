<?php

use App\Http\Controllers\NhanVienController;
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


Route::prefix('api/nhanvien')->group(function () {
    Route::get('/', [NhanVienController::class, 'index']); // Lấy danh sách nhân viên
    Route::post('/', [NhanVienController::class, 'store']); // Thêm nhân viên
    Route::get('/{id}', [NhanVienController::class, 'show']); // Lấy 1 nhân viên
    Route::put('/{id}', [NhanVienController::class, 'update']); // Cập nhật nhân viên
    Route::delete('/{id}', [NhanVienController::class, 'destroy']); // Xóa nhân viên
});

// Route::apiResource('nhanvien', NhanVienController::class);