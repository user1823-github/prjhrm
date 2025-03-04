<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRM System</title>
</head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">


</style>

<body class="bg-gray-100">

    <div class="">
        <!-- Sidebar (Menu bên trái) -->
        {{-- <aside class="sidebar sidebar-admin text-white p-3"> --}}
        <aside class="vh-100 sidebar-admin text-white p-3">
            <h2 class="fs-4 fw-bold mb-4 text-center">HRM System</h2>
            <ul class="nav flex-column">
                {{-- <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link text-white">Dashboard</a></li> --}}
                <li class="nav-item"><a href="{{ route('quanlynhanvien') }}" class="nav-link text-white">Nhân viên</a></li>
                <li class="nav-item"><a href="{{ route('quanlythongbao') }}" class="nav-link text-white">Thông báo</a></li>
                <li class="nav-item">
                    <a onclick="toggleMenu('chamcongMenu')" class="nav-link text-white">Chấm công ▼</a>
                    <ul id="chamcongMenu" class="sub-menu">
                        <li class="nav-item"><a href="{{ route('lichlamviec') }}" class="nav-link text-white">Lịch làm việc</a></li>
                        <li class="nav-item"><a href="{{ route('bangchamcong') }}" class="nav-link text-white">Bảng chấm công</a></li>
                        <li class="nav-item"><a href="{{ route('donphep') }}" class="nav-link text-white">Đơn phép</a></li>
                    </ul>
                </li>
                {{-- <li class="nav-item"><a href="{{ route('settings') }}" class="nav-link text-white">Cài đặt</a></li> --}}
            </ul>
        </aside>
    </div>

</body>
</html>

{{-- <link rel="stylesheet" type="text/js" href="{{ asset('js/app.js') }}"> --}}
<script>
    function toggleMenu(id) {
    var menu = document.getElementById(id);
    menu.classList.toggle("active-menu");
}
</script>
