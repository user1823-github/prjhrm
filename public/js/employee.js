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
                        <td>${nhanVien.maNV}</td>
                        <td>${nhanVien.hoTen}</td>
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
});

function deleteNhanVien(id) {
    if (confirm("Bạn có chắc muốn xóa nhân viên này không?")) {
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Lấy token
        
        $.ajax({
            url: `http://127.0.0.1:8000/api/nhanvien/${id}`,
            type: "DELETE",
            headers: {
                "X-CSRF-TOKEN": csrfToken
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
