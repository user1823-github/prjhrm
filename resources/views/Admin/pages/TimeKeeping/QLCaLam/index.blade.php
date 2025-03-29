@extends('app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Tabs -->
    <ul class="nav nav-tabs" id="notificationTabs">
        <li class="nav-item">
            <a class="nav-link active" id="tab-thoikhoabieu" data-bs-toggle="tab" href="#thoikhoabieu"
                data-script="{{ asset('js/thietlapcalam.js') }}">
                <img width="20" src="{{ asset('uploads/thoikhoabieu.png') }}" alt="Image"> Mẫu thời khóa biểu
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-ngayle" data-bs-toggle="tab" href="#ngayle"
                data-script="{{ asset('js/ngayle.js') }}">
                <img width="20" src="{{ asset('uploads/leave.png') }}" alt="Image"> Ngày lễ
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-lichlamviec" data-bs-toggle="tab" href="#lichlamviec"
                data-script="{{ asset('js/lichlamviec.js') }}">
                <img width="20" src="{{ asset('uploads/work-schedule.png') }}" alt="Image"> Lịch làm việc
            </a>
        </li>
    </ul>

    <!-- Nội dung của các tab -->
    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="thoikhoabieu">
            @include('Admin.pages.TimeKeeping.QLCaLam.ThoiKhoaBieu.index')
        </div>
        <div class="tab-pane fade" id="ngayle">
            {{-- @include('Admin.pages.TimeKeeping.QLCaLam.NgayLe.index') --}}
        </div>
        <div class="tab-pane fade" id="lichlamviec">
            @include('Admin.pages.TimeKeeping.QLCaLam.LichLamViec.index')
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.1/daterangepicker.min.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>
@endsection
