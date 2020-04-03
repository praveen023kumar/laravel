<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="{{ URL::asset('css/header.css') }}">
</head>
<body>
    @php
        $user_details = Auth::user();
    @endphp
    <div id="app">
    <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>{{ ucfirst($user_details->name) }}</h3>
                </div>

                <ul class="list-unstyled components">
                    <p>Dummy Heading</p>
                    @if($user_details->usertype === 1)
                    <li>
                        <a href="{{ route('admin') }}">Admin</a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ route('user') }}">Add User</a>
                    </li>
                    <li>
                        <a href="{{ route('list') }}">User List</a>
                    </li>
                </ul>
                <ul class="list-unstyled CTAs">
                    <li><a href="{{ route('logout') }}" class="download">Logout</a></li>
                </ul>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>

        
    </div>
</body>

</html>
