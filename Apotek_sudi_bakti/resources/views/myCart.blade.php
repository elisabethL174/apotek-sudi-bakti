<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        .card {
            opacity: 0;
            transition: opacity 1.5s ease-in-out, box-shadow 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-loaded {
            opacity: 1;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .container-cart {
            margin-top: 20px;
        }

        .total-price {
            font-size: 20px;
            font-weight: bold;
        }

        .checkout-btn {
            font-size: 15px;
        }

        .checkout-btn:disabled {
            cursor: not-allowed;
        }

        .table th,
        .table td {
            text-align: center;
            white-space: nowrap;
        }

        .input-group {
            padding: 2px;
            width: 100px;
        }

        .main {
            padding: 1vw;
        }

        .content {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
            padding: 10px;
        }

        .mb-3 h4 {
            margin-bottom: 5px;
        }

        .search-container {
            margin-bottom: 20px;
        }

        .card-title {
            margin-bottom: 0;
            color: white;
        }

        .card {
            margin-bottom: 20px;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        th.product-column {
        width: 30%; /* Set a fixed width for the product column */
        background-color: var(--bs-success);
        color : white;
    }

    th.remove-column {
        background-color: var(--bs-success);
        color : white;
    }

    th.price-column {
        width: 15%;
        background-color: var(--bs-success);
        color : white; /* Set a fixed width for the price column */
    }

    td.price-column {
        width: 15%;
    }

    th.quantity-column {
        width: 15%; /* Set a fixed width for the quantity column */
        background-color: var(--bs-success);
        color : white; 
    }

    td.quantity-column {
        width: 15%; /* Set a fixed width for the quantity column */
    }

    th.subtotal-column {
        width: 20%; /* Set a fixed width for the subtotal column */
        background-color: var(--bs-success);
        color : white; 
    }

    td.subtotal-column {
        width: 20%; /* Set a fixed width for the subtotal column */
    }

        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border : none ;
        }

        .table th {
            padding: 0.75rem;
            vertical-align: top;
            border : none;
        }

        .table thead th {
            vertical-align: bottom;
            border : none ;
        }

        .table tbody + tbody {
            border : none;
        }

        .table-sm th,
        .table-sm td {
            padding: 0.3rem;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: none;
        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
        }

        .table-borderless th,
        .table-borderless td,
        .table-borderless thead th,
        .table-borderless tbody + tbody {
            border: 0;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table-hover tbody tr:hover {
            color: #212529;
            background-color: rgba(0, 0, 0, 0.075);
        }

        .product-info {
            display: flex;
            align-items: center;
        }

        .text-black{
            margin-top : 20px
        }

        .custom-tr{
            background-color: var(--bs-success);
        }

        @media (max-width: 768px) {
            /* Adjust table responsiveness for smaller screens */
            .table-responsive {
                overflow-x: auto;
            }
            .table-responsive table {
                width: max-content;
                max-width: 100%;
            }
            .table-responsive-md th,
            .table-responsive-md td {
                width: auto;
                display: block;
                text-align: center;
            }

        }

        .content {
            padding: 10px; /* Adjust padding as needed */
            max-width: 100%;
            overflow-x: auto; /* Enable horizontal scroll */
        }

        span.navbar-toggler-icon {
            border-radius: 3px;
            filter: invert(100%); /* Invert the color to turn it white (or your desired color) */
        }

        .product-name {
            display: flex;
            flex-direction: column;
            align-content: center;
            margin-right: 0px;
        }

        img.img-fluid {
            margin: 0px;
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
                    <a class="navbar-link" href="/#ingfokan">Tentang Kami</a>
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
    <div class="main">
        <main class="content">
            <div class="mb-3">
                <h4>My Cart</h4>
            </div>
            <div class="card mb-2">
                @if($cartItems->isEmpty())
                <div class="text-center mb-3">
                    <h4 class="text-black">Tidak ada produk yang bisa di checkout</h4>
                </div>
                @else
                <div class="card-body shadow p-2">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th class="product-column">Product</th>
                                    <th class="price-column">Price</th>
                                    <th class="quantity-column">Quantity</th>
                                    <th class="subtotal-column">Subtotal</th>
                                    <th class="remove-column">Delete</th> <!-- New column for Remove button -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems->unique('product_id') as $item)
                                <tr>
                                    <td class="product-info">
                                        <div class="product-name">
                                            <img src="{{ asset('storage/products'.$item->product->image) }}"
                                                alt="{{ $item->product->name }}" class="img-fluid">
                                            <h5>{{ $item->product->name }}</h5>
                                        </div>
                                    </td>
                                    <td class="price-column col-2 col-sm-2 col-md-2">
                                        <span id="price{{ $item->product->id }}">Rp. {{ $item->product->price }}</span>
                                    </td>
                                    <td class="quantity-column col-2 col-sm-2 col-md-2">
                                        <div class="input-group">
                                            <input type="number" class="form-control" value="1" min="1"
                                                id="quantity{{ $item->product->id }}"
                                                data-product-id="{{ $item->product->id }}"
                                                onchange="updateTotalPrice(this)">
                                            <input type="hidden" id="hiddenQuantity{{ $item->product->id }}" value="1">
                                        </div>
                                    </td>
                                    <td class="subtotal-column col-2 col-sm-2 col-md-3">
                                        <span class="subtotal" id="subtotal{{ $item->product->id }}">
                                            Rp. {{ $item->product->price }}
                                        </span>
                                    </td>
                                    <td class="remove-column col-2 col-sm-2 col-md-2">
                                        <button type="button" class="btn btn-danger" onclick="removeProduct('{{ $item->product->id }}')">
                                        <i class='bx bxs-trash' style='color:#ffffff'  ></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="text-end mt-4 total-price" id="totalPrice">Total Price: Rp. {{ $cartItems->sum(function($item) { return $item->product->price; }) }}</div>

                    <form action="{{ route('cart.checkout') }}" method="POST" class="d-flex justify-content-end mt-3">
    @csrf
    <button id="checkoutBtn" type="submit" class="btn btn-success checkout-btn"
        {{ $cartItems->isEmpty() ? 'disabled' : '' }}>Checkout</button>
</form>



                </div>
                @endif
            </div>
        </main>
    </div>

        <script>
    document.addEventListener("DOMContentLoaded", function () {
        var cards = document.querySelectorAll('.card');
        cards.forEach(function (card) {
            card.classList.add('card-loaded');
        });
    });

    function updateTotalPrice(input) {
    var productId = input.dataset.productId;
    var quantity = input.value;
    var priceString = document.getElementById('price' + productId).textContent;
    // Extract the price from the string (assuming it's in the format 'Rp. XXXX')
    var price = parseFloat(priceString.replace('Rp. ', '')); // Convert the price to a number
    var subtotalElement = document.getElementById('subtotal' + productId);
    var totalPrice = quantity * price;

    // Check if the price extraction returned a valid number
    if (!isNaN(totalPrice)) {
        // Update subtotal
        subtotalElement.textContent = 'Rp. ' + totalPrice.toFixed(0); // Display with currency formatting

        // Update total price
        updateTotalPriceInCart();

        // Update hidden quantity input
        var hiddenQuantityInput = document.getElementById('hiddenQuantity' + productId);
        if (hiddenQuantityInput) {
            hiddenQuantityInput.value = quantity;
            // Send an AJAX request to update quantity in the database
            updateDatabaseQuantity(productId, quantity);
        }
    } else {
        console.error('Invalid price or quantity');
    }
}

function updateTotalPriceInCart() {
    // Update total price
    var total = 0;
    var subtotals = document.querySelectorAll('.subtotal');
    subtotals.forEach(function (subtotal) {
        var subtotalValue = parseFloat(subtotal.textContent.replace('Rp. ', ''));
        if (!isNaN(subtotalValue)) {
            total += subtotalValue;
        }
    });
    document.getElementById('totalPrice').textContent = 'Total Price: Rp. ' + total.toFixed(0);
}

    function updateDatabaseQuantity(productId, quantity) {
        // Send an AJAX request to update quantity in the database
        fetch('/update-quantity/' + productId, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ quantity: quantity })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => console.log(data))
        .catch(error => console.error('Error:', error));
    }

    function removeProduct(productId) {
        if (confirm('Are you sure you want to remove this product?')){
            fetch(`/remove-product/${productId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Reload the page only if the product is successfully removed
                if (data.success) {
                    location.reload();
                } else {
                    // Handle the case where the product removal was not successful
                    console.error('Product removal failed:', data.error);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }
</script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
    document.getElementById('checkoutBtn').addEventListener('click', function(event) {
        if (this.hasAttribute('disabled')) {
            event.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Your Cart is Empty',
                text: 'Add items to your cart before checking out.',
                showConfirmButton: false,
                timer: 2000
            });
        } else {
            Swal.fire({
                icon: 'success',
                title: 'Task Created Successfully!',
                showConfirmButton: false,
                timer: 2000
            });
        }
    });
</script>

        @include('sweetalert::alert')

    </body>

    </html>
