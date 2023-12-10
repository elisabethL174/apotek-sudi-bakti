<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <style>

.navbar-logo {
            width: 17vw;
            height: 5vw;
            margin-top: 0vh;
            margin-left: 15px;
        }

            .navbar-brand-text {
                font-size: 16px;
                margin-top: 12px;
                color: black;
            }

            .navbar-link {
            font-size: 1.5em;
            text-decoration: none;
            font-weight: bold;
            color: black !important;
            white-space: nowrap; /* Prevents text wrapping */
            margin-left: 10px;
            margin-right: 10px;
            font-family: 'Trebuchet MS', sans-serif;
        }

            .collapse {
                margin-right: 4.5%;
                justify-content: flex-end;
            }

            span.navbar-toggler-icon {
                border-radius: 3px;
                filter: invert(100%); /* Invert the color to turn it white (or your desired color) */
            }

            .navbar-toggler:hover {
                background-color: transparent; /* Or set it to whatever the initial state should be */
            }

            .googoogaagaa {
                padding: 1vw;;
                padding-bottom: 0px;
            }

        </style>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="yuh">
        <nav class="navbar navbar-expand-lg navbar-dark bg-white">
        <div class="navbar-brand-clickable">
                <a class="navbar-brand" href="/">
                    <img src="LOGO SUDI BAKTI HITAM.png" class ="navbar-logo" alt="Product 1">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="navbar-link" href="/#ingfokan">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-link" href="/login">Market Place</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-link" href="/register">Registrasi</a>
                    </li>
                </ul>
            </div>
        </nav>

            <div class="googoogaagaa">
                {{ $slot }}
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>
