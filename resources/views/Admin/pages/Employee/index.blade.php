@extends('app')

@section('content')
    <h2>Danh sách nhân viên</h2>
    {{-- <a href="{{ route('nhanvien.create') }}" class="btn btn-primary">Thêm Nhân viên</a> --}}
    <a href="" class="btn btn-primary">Thêm Nhân viên</a>
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
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
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/employee.js') }}"></script>
@endsection
