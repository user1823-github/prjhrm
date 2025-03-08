@extends('app')

@section('content')
    <h2>Danh sách nhân viên</h2>
    <!-- Nút mở modal thêm nhân viên -->
    <a href="#" id="addEmployeeBtn" class="btn btn-primary">Thêm nhân viên</a>
    
    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Tài khoản</th>
                <th>Họ tên</th>
                <th>Chức danh</th>
                <th>Ngày vào làm</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody id="nhanvien-table">
            <!-- Dữ liệu sẽ được đổ vào đây bằng AJAX -->
        </tbody>
    </table>

    <!-- Modal Thêm nhân viên sử dụng Bootstrap -->
    <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form id="addEmployeeForm">
            <div class="modal-header">
              <h5 class="modal-title" id="addEmployeeModalLabel">Thêm nhân viên mới</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="taiKhoan" class="form-label">
                    <span class="text-danger">*</span> Tài khoản
                </label>
                <input type="text" class="form-control" id="taiKhoan" name="taiKhoan" required>
              </div>
              <div class="mb-3">
                <label for="matKhau" class="form-label">
                    <span class="text-danger">*</span> Mật khẩu
                </label>
                <input type="password" class="form-control" id="matKhau" name="matKhau" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
              <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
    <!-- Không cần nhúng jQuery lại nếu đã được nhúng trong layout -->
    <script src="{{ asset('js/employee.js') }}"></script>
@endsection