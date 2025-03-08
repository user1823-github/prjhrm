let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
$(document).ready(function () {
    // Load danh sách nhân viên khi trang tải xong
    loadEmployees();

    // Khi nhấn nút "Thêm Nhân viên", hiển thị modal Bootstrap
    $('#addEmployeeBtn').on('click', function(e) {
        e.preventDefault();
        // Hiển thị modal (sử dụng Bootstrap 5)
        let addModal = new bootstrap.Modal(document.getElementById('addEmployeeModal'));
        addModal.show();
    });

    // Inline editing: cho phép chỉnh sửa tên nhân viên
    $('#nhanvien-table').on('blur', 'td.editable', function() {
        let newName = $(this).text();
        let id = $(this).data('id');
        $.ajax({
            url: `http://127.0.0.1:8000/api/nhanvien/${id}`,
            type: 'PUT', // hoặc PATCH
            headers: { "X-CSRF-TOKEN": csrfToken },
            data: { hoTen: newName },
            success: function(response) {
                console.log('Cập nhật tên nhân viên thành công');
            },
            error: function() {
                alert('Cập nhật tên thất bại!');
            }
        });
    });

    // Cho phép chỉnh sửa inline khi rê chuột vào ô tên
    $('#nhanvien-table').on('mouseenter', 'td.editable', function() {
        $(this).attr('contenteditable', 'true');
    }).on('mouseleave', 'td.editable', function() {
        $(this).attr('contenteditable', 'false');
    });

    // Xử lý submit form thêm nhân viên (chỉ nhập tài khoản và mật khẩu)
    $('#addEmployeeForm').on('submit', function(e) {
        e.preventDefault();
        let taiKhoan = $('#taiKhoan').val();
        let matKhau = $('#matKhau').val();
        $.ajax({
            url: "http://127.0.0.1:8000/api/taikhoan",  // Sử dụng endpoint api/taikhoan
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
                        <td>${nhanVien.tai_khoan ? nhanVien.tai_khoan.tenTaiKhoan : '56+'}</td>

                        <td class="editable" data-id="${nhanVien.maNV}">${nhanVien.hoTen}</td>
                        <td>${nhanVien.chucDanh}</td>
                        <td>${nhanVien.ngayVaoLam}</td>
                        <td>${nhanVien.soDienThoai}</td>
                        <td>${nhanVien.email}</td>
                        <td>
                            <a href="/nhanvien/${nhanVien.maNV}/edit" class="btn btn-warning">Sửa</a>
                            <button class="btn btn-danger" onclick="deleteNhanVien(${nhanVien.maNV})">Xóa</button>
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
