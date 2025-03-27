$(document).ready(function () {
    // Lấy token CSRF từ meta tag
    function getCsrfToken() {
        return $('meta[name="csrf-token"]').attr("content");
    }

    // Gọi API để tải dữ liệu lịch làm việc
    function loadLichLamViec() {
        const selectedMonth = $("#monthPicker").val(); // Lấy tháng được chọn
        $.ajax({
            url: "/api/lichlamviec",
            method: "GET",
            data: { month: selectedMonth }, // Gửi tháng lên API
            headers: { "X-CSRF-TOKEN": getCsrfToken() },
            success: function (response) {
                renderLichLamViec(response, selectedMonth);
            },
            error: function (xhr) {
                console.error("Lỗi khi tải lịch làm việc:", xhr.responseText);
            }
        });
    }

    // Hiển thị dữ liệu lên bảng lịch làm việc
    function renderLichLamViec(data, month) {
        const scheduleHeader = $("#scheduleHeader");
        const scheduleBody = $("#scheduleBody");

        scheduleHeader.empty();
        scheduleBody.empty();

        // 🚨 Kiểm tra dữ liệu API trước khi xử lý
        if (!Array.isArray(data) || data.length === 0) {
            console.error("Dữ liệu API không hợp lệ hoặc rỗng:", data);
            return;
        }

        // 🔥 Lấy danh sách ngày trong tháng được chọn
        let dates = getAllDaysInMonth(month);

        // 📝 Tạo header với danh sách ngày
        let headerRow = `<tr><th>Nhân viên</th>`;
        dates.forEach(date => {
            headerRow += `<th>${formatDate(date)}</th>`;
        });
        headerRow += `</tr>`;
        scheduleHeader.append(headerRow);

        // 🌟 Nhóm dữ liệu theo nhân viên
        const groupedByEmployee = groupBy(data, 'maNV');

        // 🏆 Hiển thị dữ liệu theo nhân viên
        Object.values(groupedByEmployee).forEach(employeeData => {
            let employee = employeeData[0].nhanvien; // Lấy thông tin nhân viên
            let row = `<tr><td class="d-flex align-items-center">
                <img src="http://127.0.0.1:8000/images/default-avatar.png" class="rounded-circle me-2" width="40" height="40" alt="Avatar">
                ${employee.hoTen}
            </td>`;

            dates.forEach(date => {
                let shift = employeeData.find(item => item.ngayLamViec === date);
                row += `<td class="text-center">`;
                if (shift) {
                    row += `<button class="schedule-box edit-shift" 
                                data-id="${shift.maLLV}" 
                                data-employee="${shift.maNV}" 
                                data-date="${shift.ngayLamViec}">
                                ${shift.tenCa} <br> ${shift.tgBatDau} - ${shift.tgKetThuc}
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

    // 🛠 Hàm lấy tất cả ngày trong tháng (YYYY-MM → [YYYY-MM-01, ..., YYYY-MM-31])
    function getAllDaysInMonth(month) {
        let dates = [];
        let yearMonth = month.split("-");
        let year = parseInt(yearMonth[0]);
        let monthNumber = parseInt(yearMonth[1]);

        let daysInMonth = new Date(year, monthNumber, 0).getDate();
        for (let day = 1; day <= daysInMonth; day++) {
            let formattedDay = day.toString().padStart(2, "0");
            dates.push(`${month}-${formattedDay}`);
        }
        return dates;
    }

    // 🛠 Hàm định dạng ngày (YYYY-MM-DD → DD/MM/YYYY)
    function formatDate(dateStr) {
        let date = new Date(dateStr);
        return date.toLocaleDateString("vi-VN");
    }

    // 🛠 Hàm nhóm mảng theo key
    function groupBy(array, key) {
        return array.reduce((result, item) => {
            (result[item[key]] = result[item[key]] || []).push(item);
            return result;
        }, {});
    }

    // Khi người dùng thay đổi tháng, tải lại dữ liệu
    $("#monthPicker").on("change", loadLichLamViec);

    // Khi trang load lần đầu
    loadLichLamViec();
});


// $(document).ready(function () {
//     // Lấy token CSRF từ meta tag
//     function getCsrfToken() {
//         return $('meta[name="csrf-token"]').attr("content");
//     }

//     // Gọi API để tải dữ liệu lịch làm việc
//     function loadLichLamViec() {
//         const selectedMonth = $("#monthPicker").val(); // Lấy tháng được chọn
//         $.ajax({
//             url: "/api/lichlamviec",
//             method: "GET",
//             data: { month: selectedMonth }, // Gửi tháng lên API
//             headers: { "X-CSRF-TOKEN": getCsrfToken() },
//             success: function (response) {
//                 renderLichLamViec(response);
//             },
//             error: function (xhr) {
//                 console.error("Lỗi khi tải lịch làm việc:", xhr.responseText);
//             }
//         });
//     }

//     // Hiển thị dữ liệu lên bảng lịch làm việc
//     function renderLichLamViec(data) {
//         const scheduleHeader = $("#scheduleHeader");
//         const scheduleBody = $("#scheduleBody");

//         scheduleHeader.empty();
//         scheduleBody.empty();

//         // 🚨 Kiểm tra dữ liệu API trước khi xử lý
//         if (!Array.isArray(data) || data.length === 0) {
//             console.error("Dữ liệu API không hợp lệ hoặc rỗng:", data);
//             return;
//         }

//         // Lấy danh sách ngày từ dữ liệu
//         let dates = [...new Set(data.map(item => item.ngayLamViec))].sort();

//         // 📝 Tạo header với danh sách ngày
//         let headerRow = `<tr><th>Nhân viên</th>`;
//         dates.forEach(date => {
//             headerRow += `<th>${formatDate(date)}</th>`;
//         });
//         headerRow += `</tr>`;
//         scheduleHeader.append(headerRow);

//         // 🌟 Nhóm dữ liệu theo nhân viên
//         const groupedByEmployee = groupBy(data, 'maNV');

//         // 🏆 Hiển thị dữ liệu theo nhân viên
//         Object.values(groupedByEmployee).forEach(employeeData => {
//             let employee = employeeData[0].nhanvien; // Lấy thông tin nhân viên
//             let row = `<tr><td class="d-flex align-items-center">
//                 <img src="http://127.0.0.1:8000/images/default-avatar.png" class="rounded-circle me-2" width="40" height="40" alt="Avatar">
//                 ${employee.hoTen}
//             </td>`;

//             dates.forEach(date => {
//                 let shift = employeeData.find(item => item.ngayLamViec === date);
//                 row += `<td class="text-center">`;
//                 if (shift) {
//                     row += `<button class="schedule-box edit-shift" 
//                                 data-id="${shift.maLLV}" 
//                                 data-employee="${shift.maNV}" 
//                                 data-date="${shift.ngayLamViec}">
//                                 ${shift.tenCa} <br> ${shift.tgBatDau} - ${shift.tgKetThuc}
//                             </button>`;
//                 } else {
//                     row += `<button class="btn btn-outline-secondary add-shift" 
//                                 data-employee="${employee.maNV}" 
//                                 data-date="${date}">+</button>`;
//                 }
//                 row += `</td>`;
//             });

//             row += `</tr>`;
//             scheduleBody.append(row);
//         });
//     }

//     // 🛠 Hàm định dạng ngày (YYYY-MM-DD → DD/MM/YYYY)
//     function formatDate(dateStr) {
//         let date = new Date(dateStr);
//         return date.toLocaleDateString("vi-VN");
//     }

//     // 🛠 Hàm nhóm mảng theo key
//     function groupBy(array, key) {
//         return array.reduce((result, item) => {
//             (result[item[key]] = result[item[key]] || []).push(item);
//             return result;
//         }, {});
//     }

//     // Khi người dùng thay đổi tháng, tải lại dữ liệu
//     $("#monthPicker").on("change", loadLichLamViec);

//     // Khi trang load lần đầu
//     loadLichLamViec();
// });



// $(document).ready(function () {
//     // Lấy token CSRF từ meta tag
//     function getCsrfToken() {
//         return $('meta[name="csrf-token"]').attr("content");
//     }

//     // Gọi API để tải dữ liệu lịch làm việc
//     function loadLichLamViec() {
//         const selectedMonth = $("#monthPicker").val(); // Lấy tháng được chọn
//         $.ajax({
//             url: "/api/lichlamviec",
//             method: "GET",
//             data: { month: selectedMonth },  // Gửi tháng lên API
//             headers: { "X-CSRF-TOKEN": getCsrfToken() },
//             success: function (response) {
//                 renderLichLamViec(response);
//             },
//             error: function (xhr) {
//                 console.error("Lỗi khi tải lịch làm việc:", xhr.responseText);
//             }
//         });
//     }

//     // Hiển thị dữ liệu lên bảng lịch làm việc
//     function renderLichLamViec(data) {
//         const scheduleHeader = $("#scheduleHeader");
//         const scheduleBody = $("#scheduleBody");
    
//         scheduleHeader.empty();
//         scheduleBody.empty();
    
//         // 🚨 Kiểm tra dữ liệu API trước khi xử lý
//         if (!data || !Array.isArray(data.dates) || !Array.isArray(data.employees)) {
//             console.error("Dữ liệu API không hợp lệ:", data);
//             return;
//         }
    
//         let headerRow = `<tr><th>Nhân viên</th>`;
//         data.dates.forEach(date => {
//             headerRow += `<th>${date.day}<br>${date.weekday}</th>`;
//         });
//         headerRow += `</tr>`;
//         scheduleHeader.append(headerRow);
    
//         data.employees.forEach(employee => {
//             let row = `<tr><td class="d-flex align-items-center">
//                 <img src="${employee.avatar}" class="rounded-circle me-2" width="40" height="40" alt="Avatar">
//                 ${employee.name}
//             </td>`;
    
//             employee.shifts.forEach(shift => {
//                 row += `<td class="text-center">`;
//                 if (shift) {
//                     row += `<button class="schedule-box edit-shift" data-id="${shift.id}" 
//                                 data-employee="${employee.id}" data-date="${shift.date}">
//                                 ${shift.time}<br><span>${shift.details}</span>
//                             </button>`;
//                 } else {
//                     row += `<button class="btn btn-outline-secondary add-shift" 
//                                 data-employee="${employee.id}" data-date="">+</button>`;
//                 }
//                 row += `</td>`;
//             });
    
//             row += `</tr>`;
//             scheduleBody.append(row);
//         });
//     }

//     // Khi người dùng thay đổi tháng, tải lại dữ liệu
//     $("#monthPicker").on("change", loadLichLamViec);

//     // Khi trang load lần đầu
//     loadLichLamViec();
// });
