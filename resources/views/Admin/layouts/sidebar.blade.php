<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRM System</title>
</head>
<body class="bg-gray-100">

    <div class="d-flex vh-100">
        <!-- Sidebar (Menu bên trái) -->
        <aside style="background: #0E1840;" class=" text-white p-3" style="width: 250px;">
            <h2 class="fs-4 fw-bold mb-4 text-center">HRM System</h2>
            <ul class="nav flex-column">
                {{-- <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link text-white">Dashboard</a></li> --}}
                <li class="nav-item"><a href="{{ route('quanlynhanvien') }}" class="nav-link text-white">Quản lý nhân viên</a></li>
                <li class="nav-item"><a href="{{ route('quanlythongbao') }}" class="nav-link text-white">Quản lý thông báo</a></li>
                {{-- <li class="nav-item"><a href="{{ route('settings') }}" class="nav-link text-white">Cài đặt</a></li> --}}
            </ul>
        </aside>
    </div>

</body>
</html>
