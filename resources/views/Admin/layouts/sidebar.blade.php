<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRM System</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-gray-100">
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="fs-4 fw-bold mb-4">HRM System</div>
            <ul class="nav flex-column">
                <li class="nav-item mb-2 rounded-2">
                    <a href="{{ route('quanlynhanvien') }}"
                        class="nav-link load-page d-flex align-items-center text-white"
                        data-url="{{ route('quanlynhanvien') }}">
                        <img width="20" src="{{ asset('uploads/employee.png') }}" alt="Image">
                        Nhân viên
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('quanlythongbao') }}"
                        class="nav-link load-page d-flex align-items-center text-white"
                        data-url="{{ route('quanlythongbao') }}">
                        <img width="20" src="{{ asset('uploads/bell.png') }}" alt="Image">
                        Thông báo
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link justify-content-between d-flex align-items-center" data-bs-toggle="collapse"
                        href="#recruitmentMenu" role="button" aria-expanded="false" aria-controls="recruitmentMenu">
                        <img width="20" src="{{ asset('uploads/team.png') }}" alt="Image">
                        Quản lý chấm công
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.5 8.25464L12 15.7546L4.5 8.25464" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <div class="collapse" id="recruitmentMenu">
                        <ul class="nav flex-column submenu">
                            <li class="nav-item mb-2">
                                <a href="{{ route('lichlamviec') }}"
                                    class="nav-link load-page d-flex align-items-center text-white"
                                    data-url="{{ route('lichlamviec') }}">
                                    <img width="20" src="{{ asset('uploads/calendar.png') }}" alt="Image">
                                    Thiết lập ca làm
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="{{ route('bangchamcong') }}"
                                    class="nav-link load-page d-flex align-items-center text-white"
                                    data-url="{{ route('bangchamcong') }}">
                                    <img width="20" src="{{ asset('uploads/hourglass.png') }}" alt="Image">
                                    Bảng chấm công
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="{{ route('donphep') }}"
                                    class="nav-link load-page d-flex align-items-center text-white"
                                    data-url="{{ route('donphep') }}">
                                    <img width="20" src="{{ asset('uploads/leave.png') }}" alt="Image">
                                    Đơn phép
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item mb-2">
                    <a href="" class="nav-link load-page d-flex align-items-center text-white" data-url="">
                        <img width="20" src="{{ asset('uploads/salary.png') }}" alt="Image">
                        Tiền lương
                    </a>
                </li>
            </ul>
        </div>
    </div>
 
</html>


{{-- <link rel="stylesheet" type="text/js" href="{{ asset('js/app.js') }}"> --}}
{{-- <script>
    function toggleMenu(id) {
        var menu = document.getElementById(id);
        menu.classList.toggle("active-menu");
    }
</script> --}}
