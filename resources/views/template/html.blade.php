<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<style>
    .navbar {
        /* position: -webkit-sticky; Untuk browser Safari */
        position: sticky;
        top: 0;
        background-color: darkblue;
        z-index: 1000; /* Pastikan navbar di atas konten */
    }
    .card{
        box-shadow: 0px 2px 2px 0px;
    }
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        background-color: rgb(239, 239, 239);
    }
    footer {
        margin-top: auto;
        width: 100%;
    }
    .btn-custom{
        border: 1px solid;
        background-color: transparent;
        color: azure;
        
    }
</style>
<body>
    @yield('container')
    <footer class="bg-dark text-light text-center py-3"> <!-- Menambahkan footer -->
        {{-- <hr class="mx-auto" style="width: 95%; border-top: 2px solid white;"> --}}
        <div class="d-flex justify-content-between mx-4">
            <div>
                <img class="mx-1" src="{{ asset('img/tiventlogo.png') }}" style="width: auto; height: 25px;" alt="">
                <img class="mx-1" src="{{ asset('img/logomc.png') }}" alt="" style="width: auto; height: 25px; ">
            </div>
            &copy; {{ date('Y') }} TiVent & Mahora Class. All Rights Reserved.
            <div>
                <img class="mx-1" src="{{ asset('img/ig.svg') }}" style="width: auto; height: 25px;" alt="">
                <img class="mx-1" src="{{ asset('img/twitter.svg') }}" alt="" style="width: auto; height: 25px; ">
                <img class="mx-1" src="{{ asset('img/tiktok.svg') }}" alt="" style="width: auto; height: 25px; ">
            </div>
        </div>
    </footer>
</body>
</html>