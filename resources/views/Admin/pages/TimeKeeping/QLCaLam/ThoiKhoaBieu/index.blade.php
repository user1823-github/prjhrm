    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <div class="container mt-4">
        <!-- Nút thêm ca làm -->
        <div class="text-end mb-3">
            <button class="btn btn-primary">+ Thêm ca làm việc mới</button>
        </div>

        <!-- Bảng thời gian làm việc -->
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="table-light">
                    <tr class="alert alert-warning">
                        <th>Ca</th>
                        <th>Thứ 2</th>
                        <th>Thứ 3</th>
                        <th>Thứ 4</th>
                        <th>Thứ 5</th>
                        <th>Thứ 6</th>
                        <th>Thứ 7</th>
                        <th>Chủ nhật</th>
                    </tr>
                </thead>
                <tbody id="scheduleTable">
                    <!-- Dữ liệu sẽ được thêm vào đây bằng jQuery -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            function fetchData() {
                $.when(
                    $.get("http://127.0.0.1:8000/api/calam"),
                    $.get("http://127.0.0.1:8000/api/chitietcalam")
                ).done(function (calamData, chitietData) {
                    let caLamList = calamData[0]; // Danh sách ca làm
                    let chiTietList = chitietData[0]; // Chi tiết ca làm

                    let groupedShifts = {};

                    // Gom nhóm dữ liệu theo ca làm
                    chiTietList.forEach(shift => {
                        if (!groupedShifts[shift.maCL]) {
                            groupedShifts[shift.maCL] = [];
                        }
                        groupedShifts[shift.maCL].push(shift);
                    });

                    let tableContent = "";

                    // Duyệt qua từng ca làm
                    caLamList.forEach(ca => {
                        let row = `<tr>
                            <td>
                                <div><strong>${ca.tenCa}</strong></div>
                                <div>Check-in: -${ca.gioCheckInSom} giờ</div>
                                <div>Check-out: +${ca.gioCheckOutMuon} giờ</div>
                                <button class="btn btn-sm btn-outline-primary mt-2">Chỉnh sửa</button>
                            </td>`;

                        // Duyệt qua các ngày trong tuần (1-7)
                        for (let i = 1; i <= 7; i++) {
                            let shift = groupedShifts[ca.maCL]?.find(s => s.thuTrongTuan == i);

                            if (shift) {
                                let tgBatDau = shift.tgBatDau.split(':').slice(0, 2).join(':'); // Chỉ lấy HH:mm
                                let tgKetThuc = shift.tgKetThuc.split(':').slice(0, 2).join(':'); // Chỉ lấy HH:mm

                                row += `<td>
                                            <button class="btn btn-primary btn-sm">
                                                ${tgBatDau} - ${tgKetThuc}
                                            </button>
                                            <button class="btn btn-outline-secondary btn-sm mt-2">+</button>
                                        </td>`;
                            } else {
                                row += `<td>
                                            <button class="btn btn-outline-secondary btn-sm">+</button>
                                        </td>`;
                            }
                        }

                        row += "</tr>";
                        tableContent += row;
                    });

                    // Hiển thị nội dung vào bảng
                    $("#scheduleTable").html(tableContent);
                }).fail(function () {
                    console.error("Lỗi khi tải dữ liệu từ API.");
                });
            }

            // Gọi hàm fetchData khi tải trang
            fetchData();
        });
    </script>

