<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/bootstrap.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
</head>
<body>
<div id="app">
    <main class="">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-2 col-lg-2 col-sm-2 ">
                    <!-- Sidebar -->
                    <div class="sidebar" id="sidebar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link collapsed" data-bs-toggle="collapse" aria-expanded="true" href="#usersMenu">
                                    <i class="bi bi-people"></i> Store
                                    <i class="bi bi-chevron-right ms-auto"></i>
                                    <i class="bi bi-chevron-down ms-auto"></i>
                                </a>
                                <div class="collapse show" id="usersMenu">
                                    <ul class="nav flex-column ps-3">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('merchant.store.list') }}">Store List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('merchant.store.create') }}">Create Store</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" aria-expanded="true" data-bs-toggle="collapse" href="#settingsMenu">
                                    <i class="bi bi-gear"></i> Category
                                    <i class="bi bi-chevron-right ms-auto"></i>
                                    <i class="bi bi-chevron-down ms-auto"></i>
                                </a>
                                <div class="collapse show" id="settingsMenu">
                                    <ul class="nav flex-column ps-3">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('merchant.category.list') }}">Category List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('merchant.category.create') }}">Create Category</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="bi bi-file-earmark-bar-graph"></i> Reports
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-10 col-lg-10 col-sm-10">
                    <div class="content" id="mainContent">
                        @yield('content')
                    </div>
                </div>

            </div>


        </div>
    </main>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="{{ asset("js/bootstrap.js") }}"></script>

</body>
</html>
