@extends('app')

@section('content')
        <!-- Tabs -->
        <ul class="nav nav-tabs" id="notificationTabs">
            <li class="nav-item">
                <a class="nav-link active" id="tab-messages" data-bs-toggle="tab" href="#messages">Hộp thoại</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab-alerts" data-bs-toggle="tab" href="#alerts">Thông báo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab-documents" data-bs-toggle="tab" href="#documents">Tài liệu</a>
            </li>
        </ul>

        <!-- Nội dung của các tab -->
        <div class="tab-content mt-3">
            <div class="tab-pane fade show active" id="messages">
                <h3>📩 Hộp thoại</h3>
                <p>Nội dung hộp thoại...</p>
            </div>
            <div class="tab-pane fade" id="alerts">
                <h3>🔔 Thông báo</h3>
                <p>Nội dung thông báo...</p>
            </div>
            <div class="tab-pane fade" id="documents">
                <h3>📂 Tài liệu</h3>
                <p>Nội dung tài liệu...</p>
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
