<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACMS - @yield('title')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f7fb;
        }

        .sidebar{
            position:fixed;
            left:0;
            top:0;
            width:260px;
            height:100vh;
            background:#0f172a;
            color:white;
            overflow:auto;
        }

        .logo{
            padding:25px;
            text-align:center;
            border-bottom:1px solid rgba(255,255,255,.1);
        }

        .logo h4{
            margin:0;
            font-weight:bold;
        }

        .sidebar a{
            color:#cbd5e1;
            display:block;
            padding:14px 20px;
            text-decoration:none;
            transition:.2s;
        }

        .sidebar a:hover{
            background:#1e293b;
            color:white;
        }

        .content{
            margin-left:260px;
        }

        .navbar-custom{
            background:white;
            box-shadow:0 2px 10px rgba(0,0,0,.08);
        }

        .card-stat{
            border:none;
            border-radius:18px;
            box-shadow:0 3px 10px rgba(0,0,0,.08);
        }

        footer{
            color:#888;
            font-size:13px;
        }

        @media(max-width:992px){

            .sidebar{
                width:70px;
            }

            .sidebar span{
                display:none;
            }

            .content{
                margin-left:70px;
            }

        }

    </style>

</head>
<body>

<div class="sidebar">

    <div class="logo">
        <h4>ACMS</h4>
        <small>Access Control</small>
    </div>

    <a href="{{ route('dashboard') }}">
        <i class="bi bi-speedometer2"></i>
        <span> Dashboard</span>
    </a>

    <a href="#">
        <i class="bi bi-credit-card"></i>
        <span> RFID Cards</span>
    </a>

    <a href="#">
        <i class="bi bi-router"></i>
        <span> Devices</span>
    </a>

    <a href="#">
        <i class="bi bi-shield-lock"></i>
        <span> Permissions</span>
    </a>

    <a href="#">
        <i class="bi bi-clock-history"></i>
        <span> Access Logs</span>
    </a>

    <a href="#">
        <i class="bi bi-gear"></i>
        <span> Settings</span>
    </a>

    <hr class="text-secondary">

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn text-light w-100 text-start ps-3">
            <i class="bi bi-box-arrow-left"></i>
            Logout
        </button>
    </form>

</div>

<div class="content">

<nav class="navbar navbar-expand-lg navbar-custom px-4">

    <div class="container-fluid">

        <h4 class="mb-0">
            @yield('title')
        </h4>

        <div>

            {{ Auth::user()->name }}

        </div>

    </div>

</nav>

<div class="container-fluid p-4">

    @yield('content')

</div>

<footer class="text-center py-3">

    ACMS © {{ date('Y') }}

</footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
