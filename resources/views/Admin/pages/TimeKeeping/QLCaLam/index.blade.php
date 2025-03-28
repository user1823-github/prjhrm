@extends('app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Tabs -->
    <ul class="nav nav-tabs" id="notificationTabs">
        <li class="nav-item">
            <a class="nav-link active" id="tab-messages" data-bs-toggle="tab" href="#messages"
                data-script="{{ asset('js/thietlapcalam.js') }}">
                <img width="20" src="{{ asset('uploads/thoikhoabieu.png') }}" alt="Image"> Mẫu thời khóa biểu
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-alerts" data-bs-toggle="tab" href="#alerts"
                data-script="{{ asset('js/ngayle.js') }}">
                <img width="20" src="{{ asset('uploads/leave.png') }}" alt="Image"> Ngày lễ
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-documents" data-bs-toggle="tab" href="#documents"
                data-script="{{ asset('js/lichlamviec.js') }}">
                <img width="20" src="{{ asset('uploads/work-schedule.png') }}" alt="Image"> Lịch làm việc
            </a>
        </li>
    </ul>

    <!-- Nội dung của các tab -->
    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="messages">
            @include('Admin.pages.TimeKeeping.QLCaLam.ThoiKhoaBieu.index')
        </div>
        <div class="tab-pane fade" id="alerts">
            {{-- @include('Admin.pages.TimeKeeping.QLCaLam.NgayLe.index') --}}
        </div>
        <div class="tab-pane fade" id="documents">
            @include('Admin.pages.TimeKeeping.QLCaLam.LichLamViec.index')
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.1/daterangepicker.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let activeTab = localStorage.getItem("activeTab") || "#messages";
            let loadedScripts = {}; // Lưu script đã tải

            function loadScript(scriptUrl) {
                if (scriptUrl && !loadedScripts[scriptUrl]) {
                    let script = document.createElement("script");
                    script.src = scriptUrl;
                    script.defer = true;
                    document.body.appendChild(script);
                    loadedScripts[scriptUrl] = true; // Đánh dấu script đã tải
                }
            }

            function handleTabClick(event) {
                let selectedTab = event.target.getAttribute("href");
                let scriptUrl = event.target.getAttribute("data-script");

                localStorage.setItem("activeTab", selectedTab);
                new bootstrap.Tab(event.target).show();
                loadScript(scriptUrl);
            }

            // Kích hoạt tab đã lưu và load script tương ứng
            let activeTabElement = document.querySelector(`a[href="${activeTab}"]`);
            if (activeTabElement) {
                new bootstrap.Tab(activeTabElement).show();
                loadScript(activeTabElement.getAttribute("data-script"));
            }

            document.querySelectorAll(".nav-link").forEach(tab => {
                tab.addEventListener("click", handleTabClick);
            });
        });
    </script>
@endsection
