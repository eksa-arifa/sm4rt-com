<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', "Smart com")</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(Session::has('success'))
    <script>
        Swal.fire({
            title: "{!! Session::get('success') !!}",
            icon: 'success'
        })
    </script>
    @endif

    @if(Session::has('error'))
    <script>
        Swal.fire({
            title: "{!! Session::get('error') !!}",
            icon: 'error'
        })
    </script>
    @endif

</body>
</html>