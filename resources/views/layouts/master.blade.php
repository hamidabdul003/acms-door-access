<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name','ACMS') }}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/responsive/3.0.7/css/responsive.bootstrap5.css" rel="stylesheet">

    <style>

        body{
            background:#F3F4F6;
            overflow-x:hidden;
        }

        .sidebar{

            position:fixed;

            top:0;

            left:0;

            width:240px;

            height:100vh;

            background:#111827;

            color:white;

            z-index:999;

        }

        .content{

            margin-left:240px;

            min-height:100vh;

        }

        .topbar{

            background:white;

            height:70px;

            box-shadow:0 4px 18px rgba(0,0,0,.08);

        }

        .brand{

            height:70px;

            display:flex;

            justify-content:center;

            align-items:center;

            flex-direction:column;

            border-bottom:1px solid rgba(255,255,255,.08);

        }

        .brand h3{

            margin:0;

            font-weight:700;

        }

        .brand small{

            color:#9ca3af;

        }

        .menu{

            padding-top:15px;

        }

        .menu a{

            color:#d1d5db;

            text-decoration:none;

            display:block;

            padding:14px 25px;

            transition:.25s;

        }

        .menu a:hover{

            background:#1f2937;

            color:white;

        }

        .menu a.active{

            background:#2563eb;

            color:white;

        }

        .menu i{

            width:22px;

        }

        .card{

            border:none;

            border-radius:18px;

            box-shadow:0 4px 18px rgba(0,0,0,.08);

        }

        footer{

            color:#777;

            font-size:14px;

        }

        @media(max-width:991px){

            .sidebar{

                left:-240px;

                transition:.3s;

            }

            .sidebar.show{

                left:0;

            }

            .content{

                margin-left:0;

            }

        }

    </style>

</head>

<body>

@include('layouts.partials.sidebar')

<div class="content">

@include('layouts.partials.navbar')

<div class="container-fluid py-4">

@yield('content')

</div>

@include('layouts.partials.footer')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>

<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>

<script src="https://cdn.datatables.net/responsive/3.0.7/js/dataTables.responsive.js"></script>

<script src="https://cdn.datatables.net/responsive/3.0.7/js/responsive.bootstrap5.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

@stack('scripts')

</body>

</html>
