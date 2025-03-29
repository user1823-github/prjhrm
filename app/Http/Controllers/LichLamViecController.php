<?php

namespace App\Http\Controllers;

use App\Models\LichLamViec;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LichLamViecController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->input('month', Carbon::now()->format('Y-m'));

        // 🗓 Lấy danh sách ngày trong tháng
        $dates = collect();
        $startOfMonth = Carbon::parse($month . '-01');
        $endOfMonth = $startOfMonth->copy()->endOfMonth();
        for ($date = $startOfMonth; $date->lte($endOfMonth); $date->addDay()) {
            $dates->push([
                'day' => $date->format('d'),
                'weekday' => $date->translatedFormat('D'),
                'full_date' => $date->toDateString(),
            ]);
        }

        $lichlamviec = LichLamViec::with('nhanvien')->get();

        return response()->json($lichlamviec, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tenCa' => 'required|string|max:50',
            'ngayLamViec' => 'required|date',
            'tgBatDau' => 'required|date_format:H:i',
            'tgKetThuc' => 'required|date_format:H:i',
            'tgBatDauNghi' => 'nullable|date_format:H:i',
            'tgKetThucNghi' => 'nullable|date_format:H:i',
            'tgCheckInSom' => 'nullable|date_format:H:i',
            'tgCheckOutMuon' => 'nullable|date_format:H:i',
            'heSoLuong' => 'numeric|min:1',
            'tienThuong' => 'numeric|min:0',
        ]);

        $lichLamViec = LichLamViec::create($request->all());
        return response()->json($lichLamViec, 201);
    }

    public function show($id)
    {
        return response()->json(LichLamViec::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $lichLamViec = LichLamViec::findOrFail($id);
        $data = $request->validate([
            'tenCa' => 'required|string|max:50',
            'ngayLamViec' => 'required|date',
            'tgBatDau' => 'required|date_format:H:i',
            'tgKetThuc' => 'required|date_format:H:i',
            'tgBatDauNghi' => 'nullable|date_format:H:i',
            'tgKetThucNghi' => 'nullable|date_format:H:i',
            'tgCheckInSom' => 'nullable|date_format:H:i',
            'tgCheckOutMuon' => 'nullable|date_format:H:i',
            'heSoLuong' => 'numeric|min:1',
            'tienThuong' => 'numeric|min:0',
        ]);

        $lichLamViec->update($data);
        return response()->json($lichLamViec, 200);
    }

    public function destroy($id)
    {
        LichLamViec::destroy($id);
        return response()->json(['message' => 'Xóa thành công']);
    }
}
