<link rel="stylesheet" href="{{ asset('css/lichlamviec.css') }}">

<div class="container">
    <!-- Thanh công cụ -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary" id="btnToday">Hôm nay</button>
            <button class="btn btn-primary" id="btnAssignShift">Gán ca làm việc</button>
            <button class="btn btn-outline-secondary">Chọn nhiều</button>
        </div>
        <input class="form-control w-auto" type="month" id="monthPicker" value="{{ date('Y-m') }}" />
    </div>

    <!-- Bảng lịch làm việc -->
    <div class="table-responsive">
        <table class="table table-bordered bg-white">
            <thead id="scheduleHeader">
                <!-- Header sẽ được thêm bằng JS -->
            </thead>
            <tbody id="scheduleBody">
                <!-- Nội dung sẽ được thêm bằng JS -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Chỉnh Sửa/Thêm Khung Giờ -->
<div class="modal fade" id="editTimeFrameModal" tabindex="-1" aria-labelledby="editTimeFrameModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editTimeFrameForm">
                <div class="modal-header">
                    <h5 class="modal-title">Chỉnh sửa khung giờ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editShiftId">
                    <input type="hidden" id="editSelectedDay">

                    <!-- Thời gian làm việc -->
                    <div class="mb-3">
                        <label class="form-label">Thời gian làm việc (*)</label>
                        <div class="d-flex">
                            <input type="time" class="form-control me-2" id="editStartTime" required>
                            <span class="align-self-center">→</span>
                            <input type="time" class="form-control ms-2" id="editEndTime" required>
                        </div>
                    </div>

                    <!-- Hệ số lương -->
                    <div class="mb-3">
                        <label class="form-label">Hệ số lương (*)</label>
                        <input type="number" class="form-control" id="editSalaryFactor" min="1" step="0.1"
                            required>
                    </div>

                    <!-- Thưởng -->
                    <div class="mb-3">
                        <label class="form-label">Thưởng</label>
                        <input type="number" class="form-control" id="editBonus" min="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="deleteTimeFrame">Xóa</button>
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- @section('scripts')
    <script src="{{ asset('js/lichlamviec.js') }}"></script>
@endsection --}}
