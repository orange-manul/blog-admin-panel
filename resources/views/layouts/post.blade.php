<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin panel</title>
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('./assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('./assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('./assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .form-label {
            font-weight: bold;
            color: #333;
        }
        .form-control, .form-check-input {
            border: 1px solid #ced4da;
            padding: 10px;
        }
        .form-check-label {
            color: #495057;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body class="g-sidenav-show  bg-gray-100">
@include('components.left-sidebar')
<main class="main-content border-radius-lg">
    <!-- Content of your main page goes here -->
    @yield('content')
    <footer class="footer py-4">
        <div class="container-fluid">
            <!-- Footer content goes here -->
        </div>
    </footer>
</main>
<!-- Fixed plugin for dashboard configuration -->
<div class="fixed-plugin">
    <!-- Content of your fixed plugin goes here -->
</div>
<!-- Core JS Files -->
<script src="{{ asset('./assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('./assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('./assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('./assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<!-- Control Center for Material Dashboard -->
<script src="{{ asset('./assets/js/material-dashboard.min.js?v=3.1.0') }}"></script>
</body>
</html>
