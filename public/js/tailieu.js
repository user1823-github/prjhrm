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
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Lấy token

        $.ajax({
            url: `http://127.0.0.1:8000/api/tailieu/${id}`,
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