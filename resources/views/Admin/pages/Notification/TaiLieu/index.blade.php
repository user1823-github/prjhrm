{{-- <a href="{{ route('nhanvien.create') }}" class="btn btn-primary">Thêm Nhân viên</a> --}}
<a href="" class="btn btn-primary">Thêm tài liệu</a>

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
    <tbody id="tailieu_table">
        <!-- Dữ liệu sẽ được đổ vào đây bằng AJAX -->
    </tbody>
</table>

{{-- @section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/tailieu.js') }}"></script>
@endsection --}}

{{-- <script>
    $(document).ready(function () {
        $.ajax({
            url: "http://127.0.0.1:8000/api/tailieu",
            type: "GET",
            dataType: "json",
            success: function (data) {
                let rows = "";
                data.forEach(taiLieu => {
                    rows += `
                        <tr>
                            <td>${taiLieu.maTL}</td>
                            <td>${taiLieu.tieuDe}</td>
                            <td>${taiLieu.url}</td>
                            <td>${taiLieu.tgBatDau}</td>
                            <td>${taiLieu.tgKetThuc}</td>
                            <td>
                                <a href="/tailieu/${taiLieu.maTL}/edit" class="btn btn-warning">Sửa</a>
                                <button class="btn btn-danger" onclick="deleteTaiLieu(${taiLieu.maTL})">Xóa</button>
                            </td>
                        </tr>
                    `;
                });
                $("#tailieu_table").html(rows);
            },
            error: function () {
                alert("Không thể lấy dữ liệu từ API!");
            }
        });
    });

    function deleteTaiLieu(id) {
        if (confirm("Bạn có chắc muốn xóa tài liệu này không?")) {
            $.ajax({
                url: `http://127.0.0.1:8000/api/tailieu/${id}`,
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

