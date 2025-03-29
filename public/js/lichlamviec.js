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
            }
        });
    }

    function renderLichLamViec(data, month) {
        const scheduleHeader = $("#scheduleHeader");
        const scheduleBody = $("#scheduleBody");
    
        scheduleHeader.empty();
        scheduleBody.empty();
    
        let dates = getAllDaysInMonth(month);
        let headerRow = `<tr><th>Nhân viên</th>`;
        dates.forEach(date => headerRow += `<th>${formatDate(date)}</th>`);
        headerRow += `</tr>`;
        scheduleHeader.append(headerRow);
    
        const groupedByEmployee = groupBy(data, 'maNV');
    
        Object.values(groupedByEmployee).forEach(employeeData => {
            let employee = employeeData[0].nhanvien;
            let row = `<tr><td class="d-flex align-items-center">
                <img src="/images/default-avatar.png" class="rounded-circle me-2" width="40" height="40" alt="Avatar">
                ${employee.hoTen}
            </td>`;
    
            dates.forEach(date => {
                let shift = employeeData.find(item => item.ngayLamViec === date);
                row += `<td class="text-center">`;
                if (shift) {
                    let startTime = shift.tgBatDau ? shift.tgBatDau.slice(0, 5) : "";
                    let endTime = shift.tgKetThuc ? shift.tgKetThuc.slice(0, 5) : "";
    
                    row += `<button class="schedule-box edit-shift" 
                                data-id="${shift.maLLV}" 
                                data-employee="${shift.maNV}" 
                                data-date="${shift.ngayLamViec}"
                                data-shift-name="${shift.tenCa || ''}"
                                data-checkin-early="${shift.tgCheckInSom || ''}"
                                data-checkout-late="${shift.tgCheckOutMuon || ''}"
                                data-start-time="${startTime}"
                                data-end-time="${endTime}"
                                data-break-start="${shift.tgBatDauNghi || ''}"
                                data-break-end="${shift.tgKetThucNghi || ''}"
                                data-salary-multiplier="${shift.heSoLuong || 1.0}"
                                data-bonus="${shift.tienThuong || 0}">
                                ${startTime} - ${endTime}
                            </button>`;
                } else {
                    row += `<button class="btn btn-outline-secondary add-shift" 
                                data-employee="${employee.maNV}" 
                                data-date="${date}">+</button>`;
                }
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
        return date.toLocaleDateString("vi-VN");
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
        $("#scheduleAddShiftForm").data({ id: shiftId, employee: employeeId, date });

        if (shiftId) {
            $("#scheduleAddShiftModalLabel").text("Cập nhật lịch làm việc");
            $("#scheduleAddShiftSubmit").text("Cập nhật").removeClass("btn-success").addClass("btn-primary");

            // Điền dữ liệu vào form
            $("#scheduleShiftName").val($(this).data("shift-name") || '');
            $("#scheduleCheckInEarly").val($(this).data("checkin-early") || '');
            $("#scheduleCheckOutLate").val($(this).data("checkout-late") || '');
            $("#scheduleStartTime").val($(this).data("start-time") || '');
            $("#scheduleEndTime").val($(this).data("end-time") || '');
            $("#scheduleBreakStartTime").val($(this).data("break-start") || '');
            $("#scheduleBreakEndTime").val($(this).data("break-end") || '');
            $("#scheduleSalaryMultiplier").val($(this).data("salary-multiplier") || 1.0);
            $("#scheduleBonus").val($(this).data("bonus") || 0);
        } else {
            $("#scheduleAddShiftModalLabel").text("Thêm mới lịch làm việc");
            $("#scheduleAddShiftSubmit").text("Thêm").removeClass("btn-primary").addClass("btn-success");
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
    
        let requestData = {
            tenCa: $("#scheduleShiftName").val(),
            ngayLamViec: date,
            tgBatDau: $("#scheduleStartTime").val(),
            tgKetThuc: $("#scheduleEndTime").val(),
            tgCheckInSom: $("#scheduleCheckInEarly").val() ,
            tgCheckOutMuon: $("#scheduleCheckOutLate").val(),
            heSoLuong: parseFloat($("#scheduleSalaryMultiplier").val()),
            tienThuong: parseFloat($("#scheduleBonus").val()),
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
                alert("Lỗi cập nhật: " + (xhr.responseJSON.message || "Vui lòng kiểm tra lại dữ liệu"));
            }
        });
    });
});
