<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>

    <link rel="stylesheet"
        href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

    @include('partials.navbar')

    @include('partials.sidebar')

    <div class="content-wrapper">

        <section class="content pt-3">

            <div class="container-fluid">

                @yield('content')

            </div>

        </section>

    </div>

</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
