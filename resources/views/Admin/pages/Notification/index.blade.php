@extends('app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.1/daterangepicker.min.css" />
    
    {{-- tai lieu --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

        <!-- Tabs -->
        <ul class="nav nav-tabs" id="notificationTabs">
            <li class="nav-item">
                <a class="nav-link active" id="tab-messages" data-bs-toggle="tab" href="#messages">📩 Hộp thoại</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab-alerts" data-bs-toggle="tab" href="#alerts">🔔 Thông báo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab-documents" data-bs-toggle="tab" href="#documents">📂 Tài liệu</a>
            </li>
        </ul>

        <!-- Nội dung của các tab -->
        <div class="tab-content mt-3">
            <div class="tab-pane fade show active" id="messages">
                @include('Admin.pages.Notification.HopThoai.index')
            </div>
            <div class="tab-pane fade" id="alerts">
                @include('Admin.pages.Notification.ThongBao.index')
            </div>
            <div class="tab-pane fade" id="documents">
                @include('Admin.pages.Notification.TaiLieu.index')
            </div>
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
    <script src="{{ asset('js/hopthoai.js') }}"></script>
    <script src="{{ asset('js/tailieu.js') }}"></script>
    <script src="{{ asset('js/thongbao.js') }}"></script>

    {{-- tai lieu --}}
    <!-- Daterangepicker CSS -->

    <!-- Moment.js & Daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.1/daterangepicker.min.js"></script>

    
@endsection

{{-- @section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/hopthoai.js') }}"></script>
    <script src="{{ asset('js/thongbao.js') }}"></script>
    <script src="{{ asset('js/tailieu.js') }}"></script>
@endsection --}}
