<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام إدارة الجيم</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            direction: rtl;
            text-align: right;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #ffffff !important;
        }
        .navbar .dropdown-menu {
            background-color: #343a40;
        }
        .navbar .dropdown-item {
            color: #ffffff;
        }
        .navbar .dropdown-item:hover {
            background-color: #495057;
        }
        .card {
            margin-bottom: 20px;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .dashboard-header {
            background-image: url('path_to_your_grand_gym_image.jpg');
            background-size: cover;
            background-position: center;
            height: 300px;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .dashboard-header h1 {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }
        @media (max-width: 767px) {
            .navbar-nav {
                text-align: center;
            }
            .navbar-collapse {
                flex-grow: 0;
            }
            .dashboard-header {
                height: 200px;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">جراند جيم</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">لوحة التحكم</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.store') }}">اضافة مستخدم</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">المستخدمين</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.active-membership') }}">اشتراكات جارية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.expiring-soon-membership') }}">اشتراكات اوشكت علي الانتهاء</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.expired-membership') }}"> اشتراكات انتهت</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> الحساب
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">الملف الشخصي</a>
                    <a class="dropdown-item" href="#">الإعدادات</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">تسجيل الخروج</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<br>
<div class="container-fluid mt-4">
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
