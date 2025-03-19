$(document).ready(function () {
    loadCaLam(); // Tải danh sách ca làm khi trang load

    // Hiển thị modal khi nhấn nút "Thêm ca làm"
    $('#addShiftBtn').on('click', function () {
        resetForm();
        new bootstrap.Modal($('#addShiftModal')).show();
    });

    // Xử lý chọn thứ làm việc
    $(document).on("click", ".shift-day", function () {
        $(this).toggleClass("btn-primary btn-outline-primary");
    });

    // Xử lý submit form thêm ca làm
    $('#addShiftForm').on('submit', function (e) {
        e.preventDefault();
        let shiftData = getShiftData();

        $.ajax({
            url: "/api/calam",
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify(shiftData),
            headers: { "X-CSRF-TOKEN": getCsrfToken() },
            success: function (response) {
                addChiTietCaLam(response.maCL);
            },
            error: function (xhr) {
                showAlert("Thêm thất bại!", xhr.responseText);
            }
        });
    });

    // Xóa ca làm
    $(document).on("click", ".delete-shift", function () {
        let id = $(this).data("id");
        if (confirm("Bạn có chắc muốn xóa ca làm này không?")) {
            deleteShift(id);
        }
    });

    // Hiển thị modal chỉnh sửa khi nhấn "Chỉnh sửa"
    $(document).on("click", ".edit-shift", function () {
        let shiftId = $(this).data("id");

        $.ajax({
            url: `/api/calam/${shiftId}`,
            type: "GET",
            success: function (data) {
                $("#editShiftId").val(data.maCL);
                $("#editShiftName").val(data.tenCa);
                $("#editCheckInEarly").val(data.gioCheckInSom);
                $("#editCheckOutLate").val(data.gioCheckOutMuon);

                new bootstrap.Modal($('#editShiftModal')).show();
            },
            error: function (xhr) {
                alert("Không thể tải dữ liệu ca làm: " + xhr.responseText);
            }
        });
    });

    // Xử lý submit form chỉnh sửa ca làm
    $('#editShiftForm').on('submit', function (e) {
        e.preventDefault();
        
        let shiftId = $("#editShiftId").val();
        let shiftData = {
            tenCa: $("#editShiftName").val(),
            gioCheckInSom: parseInt($("#editCheckInEarly").val()),
            gioCheckOutMuon: parseInt($("#editCheckOutLate").val())
        };

        $.ajax({
            url: `/api/calam/${shiftId}`,
            type: "PUT",
            contentType: "application/json",
            data: JSON.stringify(shiftData),
            headers: { "X-CSRF-TOKEN": getCsrfToken() },
            success: function () {
                alert("Cập nhật thành công!");
                $('#editShiftModal').modal('hide');
                loadCaLam();
            },
            error: function (xhr) {
                alert("Cập nhật thất bại: " + xhr.responseText);
            }
        });
    });

    // Hàm reset form khi mở modal
    function resetForm() {
        $('#addShiftForm')[0].reset();
        $('.shift-day').removeClass('btn-primary').addClass('btn-outline-primary');
    }

    // Lấy dữ liệu ca làm từ form
    function getShiftData() {
        return {
            tenCa: $("#shiftName").val(),
            gioCheckInSom: parseInt($("#checkInEarly").val()),
            gioCheckOutMuon: parseInt($("#checkOutLate").val())
        };
    }

    // Lấy token CSRF
    function getCsrfToken() {
        return $('meta[name="csrf-token"]').attr("content");
    }

    // Hiển thị thông báo
    function showAlert(title, message) {
        alert(title + " " + message);
    }

    // Thêm chi tiết ca làm
    function addChiTietCaLam(maCL) {
        let selectedDays = $(".shift-day.btn-primary").map(function () {
            return parseInt($(this).data("day"));
        }).get();

        let requests = selectedDays.map(day => {
            return $.ajax({
                url: "/api/chitietcalam",
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify({
                    thuTrongTuan: day,
                    tgBatDau: $("#startTime").val(),
                    tgKetThuc: $("#endTime").val(),
                    tgBatDauNghi: $("#breakStartTime").val() || null,
                    tgKetThucNghi: $("#breakEndTime").val() || null,
                    heSoLuong: parseFloat($("#salaryMultiplier").val()),
                    tienThuong: parseFloat($("#bonus").val()),
                    maCL: maCL
                }),
                headers: { "X-CSRF-TOKEN": getCsrfToken() }
            });
        });

        $.when(...requests).done(function () {
            alert("Thêm ca làm và chi tiết thành công!");
            $('#addShiftModal').modal('hide');
            loadCaLam();
        }).fail(function (xhr) {
            alert("Thêm chi tiết ca làm thất bại: " + xhr.responseText);
        });
    }

    // Xóa ca làm
    function deleteShift(id) {
        $.ajax({
            url: `/api/calam/${id}`,
            type: "DELETE",
            headers: { "X-CSRF-TOKEN": getCsrfToken() },
            success: function () {
                showAlert("Thành công!", "Ca làm đã được xóa.");
                loadCaLam();
            },
            error: function (xhr) {
                showAlert("Xóa thất bại!", xhr.responseText);
            }
        });
    }

    // Tải danh sách ca làm từ API
    function loadCaLam() {
        $.when($.get("/api/calam"), $.get("/api/chitietcalam"))
            .done(function (calamData, chitietData) {
                renderScheduleTable(calamData[0], chitietData[0]);
            })
            .fail(function () {
                showAlert("Lỗi!", "Không thể tải dữ liệu ca làm.");
            });
    }

    // Hiển thị bảng danh sách ca làm
    function renderScheduleTable(caLamList, chiTietList) {
        let groupedShifts = groupChiTietCaLam(chiTietList);
        let tableContent = "";

        caLamList.forEach(ca => {
            let row = `<tr>
                <td>
                    <div><strong>${ca.tenCa}</strong></div>
                    <div>Check-in: -${ca.gioCheckInSom} giờ</div>
                    <div>Check-out: +${ca.gioCheckOutMuon} giờ</div>
                    <button class="btn btn-warning edit-shift" data-id="${ca.maCL}">Chỉnh sửa</button>
                    <button class="btn btn-danger delete-shift" data-id="${ca.maCL}">Xóa</button>
                </td>`;

            for (let i = 1; i <= 7; i++) {
                let shift = groupedShifts[ca.maCL]?.find(s => s.thuTrongTuan == i);
                row += shift ? `<td><button class="btn btn-primary btn-sm">${shift.tgBatDau.slice(0, 5)} - ${shift.tgKetThuc.slice(0, 5)}</button></td>`
                             : `<td><button class="btn btn-outline-secondary btn-sm">+</button></td>`;
            }

            row += "</tr>";
            tableContent += row;
        });

        $("#scheduleTable").html(tableContent);
    }

    // Gom nhóm chi tiết ca làm theo mã ca
    function groupChiTietCaLam(chiTietList) {
        return chiTietList.reduce((acc, shift) => {
            if (!acc[shift.maCL]) acc[shift.maCL] = [];
            acc[shift.maCL].push(shift);
            return acc;
        }, {});
    }
});
