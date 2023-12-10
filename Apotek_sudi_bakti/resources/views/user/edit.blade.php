<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Akun Anda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .main {
            background-color: #CED4DA;
        }

        .container {
            width: 60%;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: #fff;
            background-color: #007bff;
            cursor: pointer;
        }

        button.btn-danger {
            background-color: #dc3545;
            margin-left: 20px;
            margin-bottom: 25px;
        }

        button.btn-primary {
            margin-left: 20px;
            margin-bottom: 25px;
        }

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
            font-family: 'Arial', sans-serif;
            font-weight: bold;
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

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="wrapper">
    <div class="main">
    <nav class="navbar navbar-expand-lg navbar-dark bg-white">
    <div class="navbar-brand-clickable">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="LOGO SUDI BAKTI HITAM.png" class ="navbar-logo" alt="Product 1">
                </a>
            </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="navbar-link" href="{{ route('home') }}#ingfokan">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-link" href="{{ route('marketplace.index') }}">Market Place</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                        </x-dropdown-link>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="navbar-link" href="{{ route('user.edit') }}">Profile</a>
                </li>
            </ul>
        </div>
    </nav>
    <hr class="border border-3 opacity-100 mt-2">
    <div class="container">
        <h1>Edit profile anda</h1>
        <form method="POST" action="{{ route('user.update') }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan Email baru Anda" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="name" id="name" placeholder="Masukkan Username baru Anda" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
        
        <!-- Delete Account Form -->
        <form action="{{ route('user.destroy') }}" method="post">
            @csrf
            @method('DELETE')
            <div class="form-group mt-3">
                <label for="password">Password untuk Konfirmasi Hapus Akun</label>
                <input type="password" name="password" id="password" placeholder="Masukkan Password Anda" required>
            </div>
            <button type="submit" class="btn btn-danger">Hapus Akun</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
