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
                            <a href="/thongbao/${thongBao.maTB}/edit" class="btn btn-warning">Sửa</a>
                            <button class="btn btn-danger" onclick="deleteThongBao(${thongBao.maTB})">Xóa</button>
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

function deleteThongBao(id) {
    if (confirm("Bạn có chắc muốn xóa thông báo này không?")) {
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Lấy token

        $.ajax({
            url: `http://127.0.0.1:8000/api/thongbao/${id}`,
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