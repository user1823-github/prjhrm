

<!-- Nút Thêm tài liệu -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTaiLieuModal">
    Thêm tài liệu
</button>
<!-- Bảng hiển thị tài liệu -->
<table class="table table-hover">
    <thead class="">
        <tr>
            <th>#</th>
            <th>Tiêu đề</th>
            <th>URL</th>
            <th>Thời gian</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody id="tailieu_table">
        <!-- Dữ liệu từ AJAX sẽ được đổ vào đây -->
    </tbody>
</table>

<!-- Modal Thêm tài liệu -->
<div class="modal fade" id="addTaiLieuModal" tabindex="-1" aria-labelledby="addTaiLieuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addTaiLieuForm">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm tài liệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tieuDe" class="form-label"><span class="text-danger">*</span> Tiêu đề</label>
                        <input type="text" class="form-control" id="tieuDe" required>
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label"><span class="text-danger">*</span> URL</label>
                        <input type="url" class="form-control" id="url" required>
                    </div>
                    <div class="mb-3">
                        <label for="thoigian" class="form-label"><span class="text-danger">*</span> Thời gian</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="thoigian" required>
                            <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Chỉnh sửa tài liệu -->
<div class="modal fade" id="editTaiLieuModal" tabindex="-1" aria-labelledby="editTaiLieuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editTaiLieuForm">
                <input type="hidden" id="editTaiLieuId">
                <div class="modal-header">
                    <h5 class="modal-title">Chỉnh sửa tài liệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editTieuDe" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="editTieuDe" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUrl" class="form-label">URL</label>
                        <input type="url" class="form-control" id="editUrl" required>
                    </div>
                    <div class="mb-3">
                        <label for="editThoigian" class="form-label">Thời gian</label>
                        <input type="text" class="form-control thoigian-picker" id="editThoigian" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>



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

