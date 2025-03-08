let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

$(document).ready(function () {
    // Load danh sách nhân viên khi trang tải xong
    loadEmployees();

    // Khi nhấn nút "Thêm Nhân viên", hiển thị modal thêm
    $('#addEmployeeBtn').on('click', function(e) {
        e.preventDefault();
        let addModal = new bootstrap.Modal(document.getElementById('addEmployeeModal'));
        addModal.show();
    });

    // Xử lý submit form thêm nhân viên (chỉ nhập tài khoản và mật khẩu)
    $('#addEmployeeForm').on('submit', function(e) {
        e.preventDefault();
        let taiKhoan = $('#taiKhoan').val();
        let matKhau = $('#matKhau').val();
        $.ajax({
            url: "http://127.0.0.1:8000/api/taikhoan",  // Endpoint tạo tài khoản + tự động tạo nhân viên
            type: "POST",
            headers: { "X-CSRF-TOKEN": csrfToken },
            data: {
                tenTaiKhoan: taiKhoan,
                matKhau: matKhau
            },
            success: function(response) {
                alert("Thêm nhân viên thành công!");
                let addModalEl = document.getElementById('addEmployeeModal');
                let modalInstance = bootstrap.Modal.getInstance(addModalEl);
                modalInstance.hide();
                $('#addEmployeeForm')[0].reset();
                loadEmployees();
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert("Thêm nhân viên thất bại!");
            }
        });
    });

    // Xử lý submit form chỉnh sửa trong modal
    $('#editFieldForm').on('submit', function(e) {
        e.preventDefault();
        let newValue = $('#fieldValue').val();
        let fieldName = $('#editFieldName').val();
        let recordId = $('#editRecordId').val();

        $.ajax({
            url: `http://127.0.0.1:8000/api/nhanvien/${recordId}`,
            type: 'PUT', // hoặc PATCH, tùy theo API của bạn
            headers: { "X-CSRF-TOKEN": csrfToken },
            data: { [fieldName]: newValue },
            success: function(response) {
                alert('Cập nhật thành công!');
                let editModalEl = document.getElementById('editFieldModal');
                let modalInstance = bootstrap.Modal.getInstance(editModalEl);
                modalInstance.hide();
                loadEmployees();
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert('Cập nhật thất bại!');
            }
        });
    });
});

// Hàm load danh sách nhân viên
function loadEmployees() {
    $.ajax({
        url: "http://127.0.0.1:8000/api/nhanvien",
        type: "GET",
        dataType: "json",
        success: function (data) {
            let rows = "";
            data.forEach(nhanVien => {
                // Chuyển đổi trạng thái: nếu true hiển thị "Hoạt động", nếu false hiển thị "Không hoạt động"
                let trangThaiText = nhanVien.trangThai ? "Hoạt động" : "Không hoạt động";
                let trangThaiValue = nhanVien.trangThai ? "1" : "0";
                rows += `
                    <tr>
                        <td>${nhanVien.maNV}</td>
                        <td>${nhanVien.tai_khoan ? nhanVien.tai_khoan.tenTaiKhoan : ''}</td>
                        
                        <td class="editable-cell" data-field="hoTen" data-id="${nhanVien.maNV}">
                            <span class="field-value">${nhanVien.hoTen}</span>
                            <i class="fa fa-pencil edit-icon" style="display:none; cursor:pointer;"></i>
                        </td>
                        <td class="editable-cell" data-field="chucDanh" data-id="${nhanVien.maNV}">
                            <span class="field-value">${nhanVien.chucDanh}</span>
                            <i class="fa fa-pencil edit-icon" style="display:none; cursor:pointer;"></i>
                        </td>
                        <td class="editable-cell" data-field="ngayVaoLam" data-id="${nhanVien.maNV}">
                            <span class="field-value">${nhanVien.ngayVaoLam}</span>
                            <i class="fa fa-pencil edit-icon" style="display:none; cursor:pointer;"></i>
                        </td>
                        <td class="editable-cell" data-field="soDienThoai" data-id="${nhanVien.maNV}">
                            <span class="field-value">${nhanVien.soDienThoai}</span>
                            <i class="fa fa-pencil edit-icon" style="display:none; cursor:pointer;"></i>
                        </td>
                        <td class="editable-cell" data-field="email" data-id="${nhanVien.maNV}">
                            <span class="field-value">${nhanVien.email}</span>
                            <i class="fa fa-pencil edit-icon" style="display:none; cursor:pointer;"></i>
                        </td>
                        <!-- Cột trạng thái dạng select -->
                        <td class="editable-cell" data-field="trangThai" data-id="${nhanVien.maNV}">
                            <select class="field-value">
                                <option value="1" ${trangThaiValue === "1" ? "selected" : ""}>Hoạt động</option>
                                <option value="0" ${trangThaiValue === "0" ? "selected" : ""}>Không hoạt động</option>
                            </select>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteNhanVien(${nhanVien.maNV})">Xóa</button>
                        </td>
                    </tr>
                `;
            });
            $("#nhanvien-table").html(rows);
            bindEditableCells();
        },
        error: function () {
            alert("Không thể lấy dữ liệu từ API!");
        }
    });
}

// Hàm bind sự kiện cho các ô có class "editable-cell"
function bindEditableCells() {
    // Các ô khác (nếu có) xử lý hover và click để mở modal...
    $('.editable-cell').hover(
        function() {
            // Nếu không phải là ô trạng thái (trangThai) có select, thì hiện icon và gạch chân
            if ($(this).data('field') !== 'trangThai') {
                $(this).find('.edit-icon').show();
                $(this).find('.field-value').css("text-decoration", "underline");
            }
        },
        function() {
            if ($(this).data('field') !== 'trangThai') {
                $(this).find('.edit-icon').hide();
                $(this).find('.field-value').css("text-decoration", "none");
            }
        }
    );

    // Xử lý cho ô không phải trangThai (mở modal)
    $('.edit-icon').off('click').on('click', function(e) {
        e.stopPropagation();
        let cell = $(this).closest('.editable-cell');
        let currentValue = cell.find('.field-value').text().trim();
        let fieldName = cell.data('field');
        let recordId = cell.data('id');

        if (fieldName !== 'trangThai') {
            let fieldDisplayName = "";
            switch(fieldName) {
                case 'hoTen': fieldDisplayName = "Họ tên"; break;
                case 'chucDanh': fieldDisplayName = "Chức danh"; break;
                case 'ngayVaoLam': fieldDisplayName = "Ngày vào làm"; break;
                case 'soDienThoai': fieldDisplayName = "Số điện thoại"; break;
                case 'email': fieldDisplayName = "Email"; break;
                default: fieldDisplayName = fieldName;
            }
            $('#editFieldModalLabel').text(`Chỉnh sửa ${fieldDisplayName}`);
            $('#editFieldForm').find('label[for="fieldValue"]').text(fieldDisplayName);
            $('#fieldValue').val(currentValue);
            $('#editFieldName').val(fieldName);
            $('#editRecordId').val(recordId);
            let editModal = new bootstrap.Modal(document.getElementById('editFieldModal'));
            editModal.show();
        }
    });

    // Xử lý riêng cho ô trạng thái (trangThai): khi chọn option mới, gửi AJAX cập nhật
    $('.editable-cell[data-field="trangThai"] select.field-value').off('change').on('change', function() {
        let newValue = $(this).val(); // "1" hoặc "0"
        let recordId = $(this).closest('.editable-cell').data('id');

        $.ajax({
            url: `http://127.0.0.1:8000/api/nhanvien/${recordId}`,
            type: 'PUT', // hoặc PATCH
            headers: { "X-CSRF-TOKEN": csrfToken },
            data: { trangThai: newValue },
            success: function(response) {
                alert("Cập nhật trạng thái thành công!");
                loadEmployees();
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert("Cập nhật trạng thái thất bại!");
            }
        });
    });
}

// Hàm xóa nhân viên
function deleteNhanVien(id) {
    if (confirm("Bạn có chắc muốn xóa nhân viên này không?")) {
        $.ajax({
            url: `http://127.0.0.1:8000/api/nhanvien/${id}`,
            type: "DELETE",
            headers: { "X-CSRF-TOKEN": csrfToken },
            success: function () {
                alert("Xóa thành công!");
                loadEmployees();
            },
            error: function () {
                alert("Xóa thất bại!");
            }
        });
    }
}
