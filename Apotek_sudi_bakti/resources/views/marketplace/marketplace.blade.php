<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Add any additional stylesheets here -->
    <style>
        .card {
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }

        .card-loaded {
            opacity: 2;
        }

        #botan {
            color: white;
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

         body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        hr {
            border-top: 3px solid #333;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .display-4 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .form-control {
            border-radius: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            font-weight: bold;
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .card-title.text-muted {
            font-size: 1rem;
            color: #666;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }

        .btn-primary,
        .btn-success {
            padding: 8px 16px;
        }

        .hero-container {
            display: flex;
            margin-top: 10px;
        }

        .hero {
            display: flex;
            background-color: #198754;
            margin: 0px;
            padding-top: 25px;
            text-align: center;
            justify-content: space-between;
        }

        .hero-texto {
            font-weight: bold;
            color: white;
        }

        .inner-container {
            display: flex;
            flex-direction: column;
        }

        .search-and-buttons {
            display: flex;
            justify-content: space-evenly;
        }

        input[type="text"] {
            width: 80%;
        }

        .btn-primary {
            color: 
        }
    </style>
</head>
<body>
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
    <div class="hero">
    <div class="container">
        <div class="inner-container row align-items-center justify-content-between mb-4">
            <div class="col-md-6">
                <h1 class="hero-texto display-4 mb-4">Our Product</h1>
            </div>
            <div class="search-and-buttons">
                <input type="text" id="searchInput" class="form-control text-center mb-3" placeholder="Cari produk">
                <a href="{{ route('cart.myCart') }}" class="btn btn-primary mb-3"><i class='bx bxs-cart' style='color:#ffffff'  ></i></a>
                <a href="{{ route('orders.myOrders') }}" class="btn btn-primary mb-3"><i class='bx bx-clipboard' style='color:ffffff'></i></a>
            </div>
        </div>
    </div>
</div>
    <hr class="border border-3 opacity-100 mt-2">

    <div class="container mt-4">
        <div class="row d-flex flex-wrap">
            @if(isset($products))
                @foreach($products as $product)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ asset('storage/products'.$product->image) }}" alt="{{ $product->name }}" class="card-img-top" style="height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $product->name }}</h5>
                                <p class="card-title text-center text-muted">{{ $product->price }}</p>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}" id="botan"><i class='bx bx-search-alt-2' style='color: white;'></i></button>
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm" id="botan"><i class='bx bx-cart-add' style='color: white;'></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-black" id="productModalLabel">{{ $product->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="botan"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Description: {{ $product->description }}</p>
                                    <p>Price: Rp. {{ $product->price }}</p>
                                    <p>Stock: {{ $product->stock }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" id="botan" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Modal -->
                @endforeach
            @endif
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var cards = document.querySelectorAll('.card');
            cards.forEach(function (card) {
                card.classList.add('card-loaded');
            });

            // Add event listener for search input
            var searchInput = document.getElementById('searchInput');
            searchInput.addEventListener('input', function () {
                var searchTerm = searchInput.value.toLowerCase();

                cards.forEach(function (card) {
                    var productName = card.querySelector('.card-title').innerText.toLowerCase();
                    var price = card.querySelector('.card-title.text-muted').innerText.toLowerCase();

                    // Show or hide card based on search
                    card.style.display = productName.includes(searchTerm) || price.includes(searchTerm) ? '' : 'none';
                });
            });
        });
    </script>
</body>
</html>