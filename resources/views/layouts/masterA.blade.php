<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-secondary">
            <div class="text-white">
                <a href="/adminView" class=" text-white">
                    <span class="navbar-toggler-icon">Menu</span>
                </a>
                <ul id="menu">
                    <li class="nav-item">
                        <a href="adminView" class="nav-link px-0 text-white">
                            Admin Home
                        </a>
                    </li>
                    <li>
                        <a href="customer_stats"  class="nav-link px-0 text-white">
                            Customer Statistics
                        </a>
                    </li>
                    <li>
                        <a href="admin_stats"  class="nav-link px-0 text-white">
                            Admin Statistics
                        </a>
                    </li>
                    <li>
                        <a href="adminAllBookings"  class="nav-link px-0 text-white">
                            All Bookings
                        </a>
                    </li>
                    <li>
                        <a href="dentist_one"  class="nav-link px-0 text-white">
                            Dentist {{$dentist1Name->d_first_name}}
                        </a>
                    </li>
                    <li>
                        <a href="dentist_two"  class="nav-link px-0 text-white">
                            Dentist {{$dentist2Name->d_first_name}}
                        </a>
                    </li>
                    <li>
                        <a href="dentist_three"  class="nav-link px-0 text-white">
                            Dentist {{$dentist3Name->d_first_name}}
                        </a>
                    </li>
                    <li>
                        <a href="monthly"  class="nav-link px-0 text-white">
                            Monthly Statistics
                        </a>
                    </li>
                    <li>
                        <a href="yearly"  class="nav-link px-0 text-white">
                            Yearly Statistics
                        </a>
                    </li>

                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 text-white">
                            Charts
                        </a>
                        <ul class="collapse nav flex-column " id="submenu1">
                            <li>
                                <a href="chart_one" class="nav-link px-0">  Chart 1</a>
                            </li>
                            <li>
                                <a href="chart_two" class="nav-link px-0">Chart 2</a>
                            </li>
                            <li>
                                <a href="chart_three" class="nav-link px-0"> Chart 3</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" >
                        {{Auth::user()->first_name}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/log_out">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>
</html>
