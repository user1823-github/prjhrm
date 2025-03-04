<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang Admin')</title>
    {{-- Bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    

</head>
<body class="bg-gray-100">

    <div class="container-fluid d-flex p-0 m-0">
        <!-- Sidebar -->
        @include('Admin.layouts.sidebar')

        <!-- Nội dung chính -->
        <main class="flex-grow-1 p-4">
            @yield('content') 
        </main>
    </div>
    <head>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
