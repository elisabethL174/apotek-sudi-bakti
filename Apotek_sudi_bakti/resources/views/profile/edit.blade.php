<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Akun Anda</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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
        }

    </style>
</head>
<body>
<div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                <a href="{{ route('home') }}" class="d-flex align-items-center pb-4 border-bottom border-dark">
                 <img src="LOGO SUDI BAKTI putih.png" alt="" class="rounded img-fluid">
                </a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="{{ route('home') }}" class="sidebar-link">
                        <i class='bx bx-list-ul'></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('products.index') }}" class="sidebar-link">
                        <i class='bx bxs-cart' ></i>
                            Product
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.orders.index') }}" class="sidebar-link">
                        <i class='bx bx-file-blank' ></i>
                            Orders
                        </a>
                    </li>     
                    </ul>
                    </li>
                </ul>
            </div>
        </aside>
    <div class="main">
    <nav class="navbar navbar-expand navbar-light bg-light px-3 border-bottom shadow-sm">
            <button class="btn" id="sidebar-toggle" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar">
                <ul class="navbar-nav">
                    
                    <li class="nav-item dropdown">
                    <a href="#" data-bs-toggle="dropdown" >
                        <div>{{ Auth::user()->name }} <i class='bx bx-chevron-down' ></i> </div> 
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">{{ __('Profile') }}</a>
                        <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="dropdown-item">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                        </form>
                    </li>             
                </ul>
            </div>
        </nav>
    <div class="container">
        <h1>Profil Akun Anda</h1>
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan Email Anda" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="name" id="name" placeholder="Masukkan Username Anda" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
        
        <!-- Delete Account Form -->
        <form action="{{ route('profile.destroy') }}" method="post">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/script.js"></script>
</body>
</html>
