<link rel="stylesheet" href="{{ asset('css/thietlapcalam.css') }}">

<div class="container">
    <!-- Nút thêm ca làm -->
    <div class="text-end mb-3">
        <button class="btn btn-primary" id="addShiftBtn">+ Thêm ca làm</button>
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

<!-- Modal Form Thêm Ca Làm -->
<div class="modal fade" id="addShiftModal" tabindex="-1" aria-labelledby="addShiftModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addShiftModalLabel">Thêm mới ca làm việc</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addShiftForm">
                    <div class="mb-3">
                        <label for="shiftName" class="form-label">Tên ca (*)</label>
                        <input type="text" class="form-control" id="shiftName" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giờ Check-in sớm (*)</label>
                        <input type="number" class="form-control" id="checkInEarly" min="0" max="5" value="0" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giờ Check-out trễ (*)</label>
                        <input type="number" class="form-control" id="checkOutLate" min="0" max="5" value="0" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thời gian làm việc (*)</label>
                        <div class="d-flex">
                            <input type="time" class="form-control me-2" id="startTime" required>
                            <span class="align-self-center">→</span>
                            <input type="time" class="form-control ms-2" id="endTime" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thời gian nghỉ (không bắt buộc)</label>
                        <div class="d-flex">
                            <input type="time" class="form-control me-2" id="breakStartTime">
                            <span class="align-self-center">→</span>
                            <input type="time" class="form-control ms-2" id="breakEndTime">
                        </div>
                        <small class="text-muted">Bỏ trống nếu không có thời gian nghỉ.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hệ số lương (*)</label>
                        <input type="number" class="form-control" id="salaryMultiplier" value="1.0" step="0.1" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thưởng</label>
                        <input type="number" class="form-control" id="bonus" value="0">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Chọn thứ làm việc (*)</label>
                        <div class="d-flex flex-wrap">
                            <button type="button" class="btn btn-outline-primary me-1 mb-1 shift-day" data-day="1">Thứ 2</button>
                            <button type="button" class="btn btn-outline-primary me-1 mb-1 shift-day" data-day="2">Thứ 3</button>
                            <button type="button" class="btn btn-outline-primary me-1 mb-1 shift-day" data-day="3">Thứ 4</button>
                            <button type="button" class="btn btn-outline-primary me-1 mb-1 shift-day" data-day="4">Thứ 5</button>
                            <button type="button" class="btn btn-outline-primary me-1 mb-1 shift-day" data-day="5">Thứ 6</button>
                            <button type="button" class="btn btn-outline-primary me-1 mb-1 shift-day" data-day="6">Thứ 7</button>
                            <button type="button" class="btn btn-outline-primary me-1 mb-1 shift-day" data-day="7">Chủ nhật</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Chỉnh Sửa Ca Làm -->
<div class="modal fade" id="editShiftModal" tabindex="-1" aria-labelledby="editShiftModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editShiftForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editShiftModalLabel">Chỉnh sửa ca làm việc</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <input type="hidden" id="editShiftId" name="editShiftId"> <!-- Lưu ID của ca làm -->
                        
                        <div class="mb-3">
                            <label for="editShiftName" class="form-label">Tên ca (*)</label>
                            <input type="text" class="form-control" id="editShiftName" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giờ Check-in sớm (*)</label>
                            <input type="number" class="form-control" id="editCheckInEarly" min="0" max="5" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giờ Check-out trễ (*)</label>
                            <input type="number" class="form-control" id="editCheckOutLate" min="0" max="5" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
    <script src="{{ asset('js/thietlapcalam.js') }}"></script>
@endsection
