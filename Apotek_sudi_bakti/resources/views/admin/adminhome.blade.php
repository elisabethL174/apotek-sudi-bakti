<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/css/style.css">
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
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3">
                <h4>Admin Dashboard,</h4>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 d-flex">
                        <div class="card flex-fill border-0 illustration">
                            <div class="card-body p-0 d-flex flex-fill">
                                <div class="row g-0 w-100">
                                    <div class="col-6">
                                        <div class="p-3 m-1">
                                            <h4>Welcome Back, {{ Auth::user()->name }}</h4>
                                            <p class="mb-0">Admin Dashboard </p>
                                        </div>
                                    </div>
                                    <div class="col-6 align-self-end text-end">
                                    <img src="customer-support.jpg" class="img-fluid illustration-img" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    </div>
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>