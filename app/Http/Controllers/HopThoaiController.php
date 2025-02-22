<?php

namespace App\Http\Controllers;

use App\Models\HopThoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Import để xử lý file

class HopThoaiController extends Controller
{
    // Lấy danh sách hộp thoại
    public function index()
    {
        $hopThoais = HopThoai::all();

        return response()->json($hopThoais, 200);
    }

    // Tạo hộp thoại mới
    public function store(Request $request)
    {
        $request->validate([
            'tieuDe' => 'required|string|max:255',
            'noiDung' => 'required',
            'url' => 'nullable|url',
            'soLanHienThi' => 'nullable|integer|min:0',
            'tgBatDau' => 'nullable|date',
            'tgKetThuc' => 'nullable|date|after:tgBatDau',
            'iconHienThi' => 'nullable|image|max:2048' // Chỉ chấp nhận ảnh, tối đa 2MB
        ]);

        // Xử lý upload icon
        $iconPath = null;
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $iconPath = 'uploads/' . $fileName;
        }

        $hopThoai = HopThoai::create([
            'tieuDe' => $request->tieuDe,
            'noiDung' => $request->noiDung,
            'url' => $request->url,
            'soLanHienThi' => $request->soLanHienThi,
            'tgBatDau' => $request->tgBatDau,
            'tgKetThuc' => $request->tgKetThuc,
            'iconHienThi' => $iconPath,
        ]);

        return response()->json($hopThoai, 201);
    }

    // Lấy chi tiết một hộp thoại
    public function show($id)
    {
        $hopThoai = HopThoai::findOrFail($id);
        return response()->json($hopThoai);
    }

    // Cập nhật hộp thoại
    public function update(Request $request, $id)
    {
        $hopThoai = HopThoai::findOrFail($id);

        $request->validate([
            'tieuDe' => 'sometimes|required|string|max:255',
            'noiDung' => 'sometimes|required',
            'url' => 'nullable|url',
            'soLanHienThi' => 'nullable|integer|min:0',
            'tgBatDau' => 'nullable|date',
            'tgKetThuc' => 'nullable|date|after:tgBatDau',
            'iconHienThi' => 'nullable|image|max:2048'
        ]);

        // Nếu có file icon mới, xóa icon cũ trước khi cập nhật
        if ($request->hasFile('icon')) {
            if ($hopThoai->icon && File::exists(public_path($hopThoai->icon))) {
                File::delete(public_path($hopThoai->icon));
            }

            $file = $request->file('icon');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $hopThoai->icon = 'uploads/' . $fileName;
        }

        // Cập nhật các trường còn lại
        $hopThoai->update($request->except('icon'));

        return response()->json($hopThoai, 200);
    }

    // Xóa hộp thoại
    public function destroy($id)
    {
        $hopThoai = HopThoai::findOrFail($id);

        // Xóa file icon nếu có
        if ($hopThoai->icon && File::exists(public_path($hopThoai->icon))) {
            File::delete(public_path($hopThoai->icon));
        }

        $hopThoai->delete();

        return response()->json(null, 204);
    }
}
