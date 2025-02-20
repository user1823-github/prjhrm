<?php

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
