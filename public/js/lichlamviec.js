$(document).ready(function () {
    function getCsrfToken() {
        return $('meta[name="csrf-token"]').attr("content");
    }

    function loadLichLamViec() {
        const selectedMonth = $("#monthPicker").val();
        $.ajax({
            url: "/api/lichlamviec",
            method: "GET",
            data: { month: selectedMonth },
            headers: { "X-CSRF-TOKEN": getCsrfToken() },
            success: function (response) {
                renderLichLamViec(response, selectedMonth);
            },
        });
    }

    // function renderLichLamViec(data, month) {
    //     const scheduleHeader = $("#scheduleHeader");
    //     const scheduleBody = $("#scheduleBody");

    //     scheduleHeader.empty();
    //     scheduleBody.empty();

    //     let dates = getAllDaysInMonth(month);
    //     let headerRow = `<tr><th class="fixed-column">Nhân viên</th>`;
    //     dates.forEach((date) => {
    //         headerRow += `<th class="date-header" data-date="${date}">${formatDate(
    //             date
    //         )}</th>`;
    //     });

    //     headerRow += `</tr>`;
    //     scheduleHeader.append(headerRow);

    //     const groupedByEmployee = groupBy(data, "maNV");

    //     Object.values(groupedByEmployee).forEach((employeeData) => {
    //         let employee = employeeData[0].nhanvien;
    //         let row = `<tr><td  class="fixed-column employee-name-cell align-middle">
    //             <img src="/images/default-avatar.png" class="rounded-circle me-2" width="40" height="40" alt="Avatar">
    //             ${employee.hoTen}
    //         </td>`;

    //         dates.forEach((date) => {
    //             let shift = employeeData.find(
    //                 (item) => item.ngayLamViec === date
    //             );
    //             // row += `<td align="center" class="text-center">`;
    //             row += `<td align="center" class="text-center">`;
    //             if (shift) {
    //                 let startTime = shift.tgBatDau
    //                     ? shift.tgBatDau.slice(0, 5)
    //                     : "";
    //                 let endTime = shift.tgKetThuc
    //                     ? shift.tgKetThuc.slice(0, 5)
    //                     : "";

    //                 row += `
    //                 <div class="my-1">
    //                     <button class="schedule-box edit-shift mx-auto"
    //                         data-id="${shift.maLLV}"
    //                         data-employee="${shift.maNV}"
    //                         data-date="${shift.ngayLamViec}"
    //                         data-shift-name="${shift.tenCa || ""}"
    //                         data-checkin-early="${shift.tgCheckInSom || ""}"
    //                         data-checkout-late="${shift.tgCheckOutMuon || ""}"
    //                         data-start-time="${startTime}"
    //                         data-end-time="${endTime}"
    //                         data-break-start="${shift.tgBatDauNghi || ""}"
    //                         data-break-end="${shift.tgKetThucNghi || ""}"
    //                         data-salary-multiplier="${shift.heSoLuong || 1.0}"
    //                         data-bonus="${shift.tienThuong || 0}">
    //                                 ${startTime} - ${endTime}
    //                     </button>
    //                 </div>
    //                 <div class="my-1">
    //                     <button class="btn btn-outline-secondary add-shift"
    //                         data-employee="${employee.maNV}"
    //                         data-date="${date}">+
    //                     </button>
    //                 </div>
    //                         `;
    //             } else {
    //                 row += `<button class="btn btn-outline-secondary add-shift"
    //                             data-employee="${employee.maNV}"

    //                             data-date="${date}">+</button>`;
    //             }
    //             row += `</td>`;
    //         });

    //         row += `</tr>`;
    //         scheduleBody.append(row);
    //     });
    // }

    function renderLichLamViec(data, month) {
        const scheduleHeader = $("#scheduleHeader");
        const scheduleBody = $("#scheduleBody");

        scheduleHeader.empty();
        scheduleBody.empty();

        let dates = getAllDaysInMonth(month);

        // Thêm class "fixed-column" để cột nhân viên cố định khi cuộn ngang
        let headerRow = `<tr><th class="fixed-column-x fixed-column employee-name-cell">Nhân viên</th>`;
        dates.forEach((date) => {
            headerRow += `<th class="date-header"  data-date="${date}">${formatDate(
                date
            )}</th>`;
        });
        headerRow += `</tr>`;
        scheduleHeader.append(headerRow);

        const groupedByEmployee = groupBy(data, "maNV");

        Object.values(groupedByEmployee).forEach((employeeData) => {
            let employee = employeeData[0].nhanvien;

            // Đảm bảo cột nhân viên có class "fixed-column"
            let row = `<tr><td class="fixed-column employee-name-cell align-middle">
                <img src="/images/default-avatar.png" class="rounded-circle me-2" width="40" height="40" alt="Avatar">
                ${employee.hoTen}
            </td>`;

            dates.forEach((date) => {
                let shift = employeeData.find(
                    (item) => item.ngayLamViec === date
                );

                row += `<td align="center" class=" text-center">`;

                if (shift) {
                    let startTime = shift.tgBatDau
                        ? shift.tgBatDau.slice(0, 5)
                        : "";
                    let endTime = shift.tgKetThuc
                        ? shift.tgKetThuc.slice(0, 5)
                        : "";

                    row += `
                    <div class="my-1">
                        <button class="schedule-box edit-shift mx-auto" 
                            data-id="${shift.maLLV}" 
                            data-employee="${shift.maNV}" 
                            data-date="${shift.ngayLamViec}"
                            data-shift-name="${shift.tenCa || ""}"
                            data-checkin-early="${shift.tgCheckInSom || ""}"
                            data-checkout-late="${shift.tgCheckOutMuon || ""}"
                            data-start-time="${startTime}"
                            data-end-time="${endTime}"
                            data-break-start="${shift.tgBatDauNghi || ""}"
                            data-break-end="${shift.tgKetThucNghi || ""}"
                            data-salary-multiplier="${shift.heSoLuong || 1.0}"
                            data-bonus="${shift.tienThuong || 0}">
                                ${startTime} - ${endTime}
                        </button> 
                    </div>
                    `;
                }

                // Luôn hiển thị nút "Thêm Ca" ở dưới
                row += `
                <div class="my-1">
                    <button class="btn btn-outline-secondary add-shift" 
                        data-employee="${employee.maNV}" 
                        data-date="${date}">+
                    </button> 
                </div>
                `;

                row += `</td>`;
            });

            row += `</tr>`;
            scheduleBody.append(row);
        });
    }

    function getAllDaysInMonth(month) {
        let dates = [];
        let yearMonth = month.split("-");
        let daysInMonth = new Date(yearMonth[0], yearMonth[1], 0).getDate();
        for (let day = 1; day <= daysInMonth; day++) {
            dates.push(`${month}-${String(day).padStart(2, "0")}`);
        }
        return dates;
    }

    function formatDate(dateStr) {
        let date = new Date(dateStr);
        let day = String(date.getDate()).padStart(2, "0"); // 01, 02, 03,...
        let month = String(date.getMonth() + 1).padStart(2, "0"); // 01, 02, 03,...

        let weekdayNames = [
            "Chủ nhật",
            "Thứ 2",
            "Thứ 3",
            "Thứ 4",
            "Thứ 5",
            "Thứ 6",
            "Thứ 7",
        ];
        let weekday = weekdayNames[date.getDay()]; // Lấy thứ của ngày

        return `${day}/${month}<br><small>${weekday}</small>`;
    }

    function groupBy(array, key) {
        return array.reduce((result, item) => {
            (result[item[key]] = result[item[key]] || []).push(item);
            return result;
        }, {});
    }

    $(document).on("click", ".add-shift, .edit-shift", function () {
        let shiftId = $(this).hasClass("edit-shift") ? $(this).data("id") : "";
        let employeeId = $(this).data("employee");
        let date = $(this).data("date");

        $("#scheduleAddShiftForm")[0].reset();
        $("#scheduleAddShiftForm").data({
            id: shiftId,
            employee: employeeId,
            date,
        });

        if (shiftId) {
            $("#scheduleAddShiftModalLabel").text("Cập nhật lịch làm việc");
            $("#scheduleAddShiftSubmit")
                .text("Cập nhật")
                .removeClass("btn-success")
                .addClass("btn-primary");

            // Điền dữ liệu vào form
            $("#scheduleShiftName").val($(this).data("shift-name") || "");
            $("#scheduleCheckInEarly").val($(this).data("checkin-early") || "");
            $("#scheduleCheckOutLate").val($(this).data("checkout-late") || "");
            $("#scheduleStartTime").val($(this).data("start-time") || "");
            $("#scheduleEndTime").val($(this).data("end-time") || "");
            $("#scheduleBreakStartTime").val($(this).data("break-start") || "");
            $("#scheduleBreakEndTime").val($(this).data("break-end") || "");
            $("#scheduleSalaryMultiplier").val(
                $(this).data("salary-multiplier") || 1.0
            );
            $("#scheduleBonus").val($(this).data("bonus") || 0);
        } else {
            $("#scheduleAddShiftModalLabel").text("Thêm mới lịch làm việc");
            $("#scheduleAddShiftSubmit")
                .text("Thêm")
                .removeClass("btn-primary")
                .addClass("btn-success");
        }

        $("#scheduleAddShiftModal").modal("show");
    });

    $("#monthPicker").on("change", loadLichLamViec);
    loadLichLamViec();

    $(document).on("submit", "#scheduleAddShiftForm", function (e) {
        e.preventDefault();

        let shiftId = $(this).data("id");
        let employeeId = $(this).data("employee");
        let date = $(this).data("date");

        function formatTime(value) {
            return value ? value.slice(0, 5) : null; // Cắt bỏ giây nếu có
        }

        let requestData = {
            maNV: employeeId || $("#scheduleAddShiftForm").data("employee"),
            tenCa: $("#scheduleShiftName").val().trim(),
            ngayLamViec: date,
            tgBatDau: formatTime($("#scheduleStartTime").val()),
            tgKetThuc: formatTime($("#scheduleEndTime").val()),
            tgBatDauNghi: formatTime($("#scheduleBreakStartTime").val()),
            tgKetThucNghi: formatTime($("#scheduleBreakEndTime").val()),
            tgCheckInSom: formatTime($("#scheduleCheckInEarly").val()),
            tgCheckOutMuon: formatTime($("#scheduleCheckOutLate").val()),
            heSoLuong: parseFloat($("#scheduleSalaryMultiplier").val()) || 1.0,
            tienThuong: parseFloat($("#scheduleBonus").val()) || 0,
        };

        let url = `/api/lichlamviec/${shiftId}`;
        let method = shiftId ? "PUT" : "POST";

        $.ajax({
            url: url,
            method: method,
            data: requestData,
            headers: { "X-CSRF-TOKEN": getCsrfToken() },
            success: function (response) {
                $("#scheduleAddShiftModal").modal("hide");
                loadLichLamViec();
                alert("Cập nhật thành công!");
            },
            error: function (xhr) {
                alert(
                    "Lỗi cập nhật: " +
                        (xhr.responseJSON.message ||
                            "Vui lòng kiểm tra lại dữ liệu")
                );
            },
        });
    });

    // Xóa
    $(document).on("click", ".add-shift, .edit-shift", function () {
        let shiftId = $(this).hasClass("edit-shift") ? $(this).data("id") : "";

        if (shiftId) {
            $("#scheduleDeleteShift").show(); // Hiện nút Xóa
        } else {
            $("#scheduleDeleteShift").hide(); // Ẩn nút Xóa nếu thêm mới
        }
    });

    $(document).on("click", "#scheduleDeleteShift", function () {
        let shiftId = $("#scheduleAddShiftForm").data("id");

        if (!shiftId) return;

        if (confirm("Bạn có chắc chắn muốn xóa ca làm việc này không?")) {
            $.ajax({
                url: `/api/lichlamviec/${shiftId}`,
                method: "DELETE",
                headers: { "X-CSRF-TOKEN": getCsrfToken() },
                success: function () {
                    $("#scheduleAddShiftModal").modal("hide");
                    loadLichLamViec();
                    alert("Xóa thành công!");
                },
                error: function (xhr) {
                    alert(
                        "Lỗi khi xóa: " +
                            (xhr.responseJSON.message || "Vui lòng thử lại.")
                    );
                },
            });
        }
    });

    // $("#btnToday")
    //     .off("click")
    //     .on("click", function () {
    //         let today = new Date();
    //         let year = today.getFullYear();
    //         let month = String(today.getMonth() + 1).padStart(2, "0");
    //         let day = String(today.getDate()).padStart(2, "0");
    //         let todayStr = `${year}-${month}-${day}`; // Định dạng YYYY-MM-DD

    //         let todayCell = $(`#scheduleHeader th[data-date="${todayStr}"]`);
    //         if (todayCell.length === 0) {
    //             alert("Không tìm thấy lịch ngày hôm nay!");
    //             return;
    //         }

    //         let columnIndex = todayCell.index();
    //         if (columnIndex > 0) {
    //             let tableContainer = $(".table-responsive");
    //             let targetOffset = $(
    //                 `#scheduleBody td:nth-child(${columnIndex + 1})`
    //             ).position().left;

    //             // Cuộn từ từ (chậm hơn)
    //             tableContainer.animate(
    //                 { scrollLeft: targetOffset },
    //                 1200,
    //                 "swing"
    //             );

    //             // Highlight cả cột (header + body)
    //             todayCell.addClass("highlight");
    //             $(`#scheduleBody td:nth-child(${columnIndex + 1})`).addClass(
    //                 "highlight"
    //             );

    //             // Xóa highlight sau 3 giây
    //             setTimeout(() => {
    //                 todayCell.removeClass("highlight");
    //                 $(
    //                     `#scheduleBody td:nth-child(${columnIndex + 1})`
    //                 ).removeClass("highlight");
    //             }, 3000);
    //         }
    //     });

    $("#btnToday")
        .off("click")
        .on("click", function () {
            let today = new Date();
            let year = today.getFullYear();
            let month = String(today.getMonth() + 1).padStart(2, "0");
            let day = String(today.getDate()).padStart(2, "0");
            let todayStr = `${year}-${month}-${day}`; // Định dạng YYYY-MM-DD

            let todayCell = $(`#scheduleHeader th[data-date="${todayStr}"]`);
            if (todayCell.length === 0) {
                alert("Không tìm thấy lịch ngày hôm nay!");
                return;
            }

            let columnIndex = todayCell.index();
            if (columnIndex > 0) {
                let tableContainer = $(".table-responsive");
                let targetOffset = $(
                    `#scheduleBody td:nth-child(${columnIndex + 1})`
                ).position().left;

                tableContainer.animate({ scrollLeft: targetOffset }, 500);

                // Highlight ngày hôm nay
                todayCell.addClass("highlight");
                setTimeout(() => todayCell.removeClass("highlight"), 3000);
            }
        });
});
