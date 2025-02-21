@extends('app')

@section('content')
    {{-- <h2>Danh sách Nhân viên</h2> --}}
    {{-- <a href="{{ route('nhanvien.create') }}" class="btn btn-primary">Thêm Nhân viên</a> --}}
    <a href="" class="btn btn-primary">Thêm Nhân viên</a>
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Chức danh</th>
                <th>Ngày vào làm</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody id="nhanvien-table">
            <!-- Dữ liệu sẽ được đổ vào đây bằng AJAX -->
        </tbody>
    </table>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $.ajax({
            url: "http://127.0.0.1:8000/api/nhanvien",
            type: "GET",
            dataType: "json",
            success: function (data) {
                let rows = "";
                data.forEach(nhanVien => {
                    rows += `
                        <tr>
                            <td>${nhanVien.maNhanVien}</td>
                            <td>${nhanVien.hoTen}</td>
                            <td>${nhanVien.chucDanh}</td>
                            <td>${nhanVien.ngayVaoLam}</td>
                            <td>${nhanVien.soDienThoai}</td>
                            <td>${nhanVien.email}</td>
                            <td>
                                <a href="/nhanvien/${nhanVien.maNhanVien}/edit" class="btn btn-warning">Sửa</a>
                                <button class="btn btn-danger" onclick="deleteNhanVien(${nhanVien.maNhanVien})">Xóa</button>
                            </td>
                        </tr>
                    `;
                });
                $("#nhanvien-table").html(rows);
            },
            error: function () {
                alert("Không thể lấy dữ liệu từ API!");
            }
        });
    });

    function deleteNhanVien(id) {
        if (confirm("Bạn có chắc muốn xóa nhân viên này không?")) {
            $.ajax({
                url: `http://127.0.0.1:8000/api/nhanvien/${id}`,
                type: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                success: function () {
                    alert("Xóa thành công!");
                    location.reload();
                },
                error: function () {
                    alert("Xóa thất bại!");
                }
            });
        }
    }
</script>

