{{-- <a href="{{ route('nhanvien.create') }}" class="btn btn-primary">Thêm Nhân viên</a> --}}
<a href="" class="btn btn-primary">Thêm thông báo</a>

<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>URL</th>
            <th>Bắt đầu</th>
            <th>Kết thúc</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody id="thongbao_table">
        <!-- Dữ liệu sẽ được đổ vào đây bằng AJAX -->
    </tbody>
</table>

{{-- @section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/thongbao.js') }}"></script>
@endsection --}}

{{-- <script>
    $(document).ready(function () {
        $.ajax({
            url: "http://127.0.0.1:8000/api/thongbao",
            type: "GET",
            dataType: "json",
            success: function (data) {
                let rows = "";
                data.forEach(thongBao => {
                    rows += `
                        <tr>
                            <td>${thongBao.maTB}</td>
                            <td>${thongBao.tieuDe}</td>
                            <td>${thongBao.url}</td>
                            <td>${thongBao.tgBatDau}</td>
                            <td>${thongBao.tgKetThuc}</td>
                            <td>
                                <a href="/tailieu/${thongBao.maTL}/edit" class="btn btn-warning">Sửa</a>
                                <button class="btn btn-danger" onclick="deleteTaiLieu(${thongBao.maTB})">Xóa</button>
                            </td>
                        </tr>
                    `;
                });
                $("#thongbao_table").html(rows);
            },
            error: function () {
                alert("Không thể lấy dữ liệu từ API!");
            }
        });
    });

    function deleteTaiLieu(id) {
        if (confirm("Bạn có chắc muốn xóa thông báo này không?")) {
            $.ajax({
                url: `http://127.0.0.1:8000/api/thongbao/${id}`,
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
</script> --}}

