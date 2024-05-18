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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .btn-primary {
            background-color: #014D81;
        }

        /* Rectangle 5 */

        .navbar {
            height: 76px;

            /* white */
            background: #FFFFFF;
            /* slate/300 */
            border: 1px solid #CBD5E1;
        }

        h1, h2, h3, h4, h5, h6 {
            color: #014D81;
            font-weight: bold;
        }

        .base-color {
            color: #014D81 !important;
        }

        .btn{
            padding: 8px 16px;
            border-radius: 10px;
        }

        .form-control {
            padding: 8px 16px;
            border-radius: 10px;
        }

        .modal-backdrop {
            background-color: rgba(255, 255, 255, 1) !important;
            opacity: 0.9 !important;
            backdrop-filter: blur(400px);
        }

        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Opacity 0.5 untuk backdrop */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999; /* Menempatkan di atas elemen lain */
        }

        .loading-spinner {
            color: #fff; /* Warna teks putih */
        }

        .modal-content {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-success{
            background-color: #39DA00;
            color: #014D81;
            font-weight: bold;
            border: none;
        }

        .badge-custom {
            box-sizing: border-box;
            align-items: center;
            padding: 5px 10px;
            gap: 10px;
            background: #BBDDB0; /* Warna dengan transparansi */
            border: 1px solid green;
            color: black;
            border-radius: 20px;
        }

        .bg-green-light {
            background-color: #BBDDB0;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 2px; /* Atur jarak antar baris menjadi 10px */
        }

        td {
            padding: 2px; /* Atur padding pada sel */
        }

    </style>
    @yield('style-css')

</head>
<body>
    @if(Route::is('login'))
        <div class="d-flex fixed-top justify-content-end end-0">
            <div class="card border-0 rounded-5 me-5 mt-4 shadow">
                <div class="p-2">
                    <span class="fw-bold m-2 p-2">Don't have an Account ? <a href="{{ route('register') }}" class="text-decoration-none">Register</a></span>
                </div>
            </div>
        </div>
    @endif
    @include('layouts.modal')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-lg @if(Route::is('login')) d-none @endif">
            <div class="container-fluid justify-content-between">
                <div class="mx-auto d-flex align-items-center">
                    <span class="me-2">@yield('back-button')</span>
                    <a class="navbar-brand fw-bold" href="{{ url('/schedule') }}">
                        <span class="fs-2 base-color mx-auto">
                            <span class="small text-muted">@yield('text-small')</span>
                            @yield('page-title', 'Monster Backup')
                        </span>
                        @yield('badge-process')
                    </a>
                </div>
                @if(Route::is('register'))
                    <div class="d-flex justify-content-end end-0">
                        <div class="card border-0 rounded-5 m-5 shadow">
                            <div class="p-2">
                                <span class="fw-bold m-2 p-2">Have an Account ? <a href="{{ route('login') }}" class="text-decoration-none">Login</a></span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            @if(Auth::user())
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-5">
                        <a class="nav-link fw-bold text-black" href="">Support</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link fw-bold text-black" href="">Documentation</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link fw-bold text-black" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto border-start border-2 border-top border-bottom w-50">
                    <li class="nav-item">
                        <div class="d-flex align-items-center p-3 w-100">
                            <img src="https://dummyimage.com/40x40/000/fff&text={{ substr(Auth::user()->name, 0, 1) }}" class="rounded-circle me-3" alt="Avatar" style="width: 40px; height: 40px;">
                            <div>
                                <div class="fw-bold">{{ Auth::user()->name }}</div>
                                <div class="text-muted small">{{ Auth::user()->email }}</div>
                            </div>
                        </div>
                    </li>
                </ul>
            @endif

        </nav>
        <main @if(!Route::is('login')) class="py-4" @endif style="z-index: 999;">
            @yield('content')
        </main>
    </div>

    <div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="{{ asset('images/monster-data.svg') }}" class="img-fluid mx-auto m-2" style="min-width: 250px" alt="Monster Backup">
                    <div id="responseTitle" class="h5 mt-2 fs-1 base-color fw-bold">Response Title</div>
                    <div id="responseMessage" class="fs-4 base-color">
                        Please check your email to activate your Monster Backup Account.
                    </div>
                    <div>
                        <a href="{{ route('login') }}" class="btn btn-primary m-3">Go to Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer fixed-bottom" style="z-index: -1;">
        <div class=" position-relative">
            <div class="row align-items-center">
                <div class="col-md-6 text-md-start text-center position-absolute bottom-0 start-0 m-5" style="z-index: 0;">
                    <p class="text-muted mb-1">Powered by </p>
                    <p class="fw-bold">Monster Data Asia</p>
                </div>
                <div class="col-md-6 text-md-end text-center position-absolute bottom-0 end-0 m-5" style="z-index: 0;">
                    <p class="text-muted mb-1">V 1.3 Latest Update: Mei 17, 2024</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    @if(Route::is('login'))
                        <img src="{{ asset('images/footer.svg') }}" alt="Logo" style="z-index: -1;">
                    @else
                        <img src="{{ asset('images/footer-muted.svg') }}" alt="Logo" style="z-index: -1;">
                    @endif
                </div>
            </div>

        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    <script>
        $(document).ready(function() {
            $('body').append('<div class="loading-screen"><div class="spinner-border loading-spinner text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');

            // Tampilkan loading screen saat link di klik
            $(document).on('click', 'a', function() {
                $('.loading-screen').fadeIn();
            });

            // Sembunyikan loading screen saat browser meninggalkan halaman
            $(window).on('beforeunload', function() {
                $('.loading-screen').fadeOut();
            });

            // Sembunyikan loading screen setelah 200ms
            setTimeout(function() {
                $('.loading-screen').fadeOut();
            }, 200);
        });

        /** Triger Modal **/
        @if(session('title') || session('message'))

            $(document).ready(function () {
                $('#responseModal').modal('show');
            });

        @endif
    </script>

</body>
</html>
