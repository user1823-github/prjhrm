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
                        
                        <!-- Cột Trạng thái -->
                        <td class="editable-cell" data-field="trangThai" data-id="${nhanVien.maNV}">
                            <select class="field-value">
                                <option value="1" ${nhanVien.trangThai == 1 ? 'selected' : ''}>Hoạt động</option>
                                <option value="0" ${nhanVien.trangThai == 0 ? 'selected' : ''}>Không hoạt động</option>
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
    // Khi hover vào ô, hiển thị icon cây bút và gạch chân text
    $('.editable-cell').hover(
        function() {
            $(this).find('.edit-icon').show();
            $(this).find('.field-value').css("text-decoration", "underline");
        },
        function() {
            $(this).find('.edit-icon').hide();
            $(this).find('.field-value').css("text-decoration", "none");
        }
    );

    // Khi click vào icon, mở modal chỉnh sửa
    $('.edit-icon').on('click', function(e) {
        e.stopPropagation();
        let cell = $(this).closest('.editable-cell');
        let currentValue = cell.find('.field-value').text();
        let fieldName = cell.data('field');
        let recordId = cell.data('id');

        // Cập nhật tiêu đề modal dựa trên trường
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
        $('#editFieldModalLabelContent').text(`${fieldDisplayName}`);

        // Điền thông tin hiện tại vào modal
        $('#fieldValue').val(currentValue);
        $('#editFieldName').val(fieldName);
        $('#editRecordId').val(recordId);

        // Mở modal chỉnh sửa
        let editModal = new bootstrap.Modal(document.getElementById('editFieldModal'));
        editModal.show();
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
