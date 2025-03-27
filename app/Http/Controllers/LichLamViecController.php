<?php

namespace App\Http\Controllers;

use App\Models\LichLamViec;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LichLamViecController extends Controller
{
    // public function index(Request $request)
    // {
    //     $month = $request->input('month', Carbon::now()->format('Y-m'));

    //     // 🗓 Lấy danh sách ngày trong tháng
    //     $dates = collect();
    //     $startOfMonth = Carbon::parse($month . '-01');
    //     $endOfMonth = $startOfMonth->copy()->endOfMonth();
    //     for ($date = $startOfMonth; $date->lte($endOfMonth); $date->addDay()) {
    //         $dates->push([
    //             'day' => $date->format('d'),
    //             'weekday' => $date->translatedFormat('D'),
    //             'full_date' => $date->toDateString(),
    //         ]);
    //     }



    //     $employees = NhanVien::with(['lichlamviec' => function ($query) use ($month) {
    //         $query->whereBetween('ngayLamViec', [
    //             Carbon::parse($month . '-01')->startOfMonth(),
    //             Carbon::parse($month . '-01')->endOfMonth()
    //         ]);
    //     }])->get();

    //     // 📌 Format dữ liệu
    //     $employeeData = $employees->map(function ($nv) use ($dates) {
    //         return [
    //             'id' => $nv->maNV,
    //             'name' => $nv->hoTen,
    //             'avatar' => $nv->avatar ?? asset('images/default-avatar.png'),
    //             'shifts' => $dates->map(function ($date) use ($nv) {
    //                 $shift = $nv->lichLamViec->where('ngayLamViec', $date['full_date'])->first();
    //                 return $shift ? [
    //                     'id' => $shift->maLLV,
    //                     'date' => $shift->ngayLamViec,
    //                     'time' => "{$shift->tgBatDau} - {$shift->tgKetThuc}",
    //                     'details' => "Lương: {$shift->heSoLuong} | Thưởng: {$shift->tienThuong}"
    //                 ] : null;
    //             })
    //         ];
    //     });

    //     return response()->json([
    //         'dates' => $dates,
    //         'employees' => $employeeData
    //     ]);
    // }

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
            'tgBatDau' => 'required',
            'tgKetThuc' => 'required',
            'tgCheckInSom' => 'integer|min:0',
            'tgCheckOutMuon' => 'integer|min:0',
            'heSoLuong' => 'numeric|min:0',
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
        $lichLamViec->update($request->all());
        return response()->json($lichLamViec);
    }

    public function destroy($id)
    {
        LichLamViec::destroy($id);
        return response()->json(['message' => 'Xóa thành công']);
    }
}
