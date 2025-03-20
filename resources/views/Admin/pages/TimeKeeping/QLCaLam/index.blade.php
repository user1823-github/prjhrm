@extends('app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    
    
    <!-- Tabs -->
    <ul class="nav nav-tabs" id="notificationTabs">
        <li class="nav-item">
            <a class="nav-link active" id="tab-messages" data-bs-toggle="tab" href="#messages">
                <i class="bi bi-calendar-check"></i> Mẫu thời khóa biểu
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-alerts" data-bs-toggle="tab" href="#alerts">
                <i class="bi bi-calendar-event"></i> Ngày lễ
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-documents" data-bs-toggle="tab" href="#documents">
                <i class="bi bi-clock-history"></i> Lịch làm việc
            </a>
        </li>
    </ul>

    <!-- Nội dung của các tab -->
    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="messages">
            @include('Admin.pages.TimeKeeping.QLCaLam.ThoiKhoaBieu.index')
            {{-- Nội dung mẫu thời khóa biểu --}}
        </div>
        <div class="tab-pane fade" id="alerts">
            @include('Admin.pages.TimeKeeping.QLCaLam.NgayLe.index')
            Nội dung ngày lễ
        </div>
        <div class="tab-pane fade" id="documents">
            {{-- @include('Admin.pages.TimeKeeping.QLCaLam.LichLamViec.index') --}}
            Nội dung lịch làm việc
        </div>
    </div>

    <!-- JavaScript để lưu trạng thái tab -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let activeTab = localStorage.getItem("activeTab");
            if (activeTab) {
                let tabElement = document.querySelector(`a[href="${activeTab}"]`);
                if (tabElement) {
                    new bootstrap.Tab(tabElement).show();
                }
            }

            document.querySelectorAll(".nav-link").forEach(tab => {
                tab.addEventListener("click", function () {
                    localStorage.setItem("activeTab", this.getAttribute("href"));
                });
            });
        });
    </script>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="{{ asset('js/thietlapcalam.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/ngayle.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/lichlamviec.js') }}"></script> --}}

    {{-- tai lieu --}}
    <!-- Daterangepicker CSS -->

    <!-- Moment.js & Daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.1/daterangepicker.min.js"></script>

    
@endsection