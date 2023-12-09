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
            padding: 80px;
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

        .product-info img {
            max-height: 50px;
            margin-right: 10px;
        }

        .text-black{
            margin-top : 20px
        }

        .custom-tr{
            background-color: var(--bs-success);
        }
    </style>
</head>

<body>
    <div class="main">
        <main class="content px-3 py-2">
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
                        <table class="table table-bordered">
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
                                        <img src="{{ asset('storage/'.$item->product->image) }}"
                                            alt="{{ $item->product->name }}" class="img-fluid">
                                        <h5>{{ $item->product->name }}</h5>
                                    </td>
                                    <td class="price-column">
                                        <span id="price{{ $item->product->id }}">${{ $item->product->price }}</span>
                                    </td>
                                    <td class="quantity-column">
                                        <div class="input-group">
                                            <input type="number" class="form-control" value="1" min="1"
                                                id="quantity{{ $item->product->id }}"
                                                data-product-id="{{ $item->product->id }}"
                                                onchange="updateTotalPrice(this)">
                                            <input type="hidden" id="hiddenQuantity{{ $item->product->id }}" value="1">
                                        </div>
                                    </td>
                                    <td class="subtotal-column">
                                        <span class="subtotal" id="subtotal{{ $item->product->id }}">
                                            ${{ $item->product->price }}
                                        </span>
                                    </td>
                                    <td class="remove-column">
    <button type="button" class="btn btn-danger" onclick="removeProduct('{{ $item->product->id }}')">
    <i class='bx bxs-trash' style='color:#ffffff'  ></i>
    </button>
</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="text-end mt-4 total-price" id="totalPrice">Total Price: ${{ $cartItems->sum(function($item) { return $item->product->price; }) }}</div>

                    <form action="{{ route('cart.checkout') }}" method="POST"
                        class="d-flex justify-content-end mt-3">
                        @csrf
                        <button type="submit" class="btn btn-success checkout-btn"
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
        var price = document.getElementById('price' + productId).textContent.replace('$', '');
        var subtotalElement = document.getElementById('subtotal' + productId);
        var totalPrice = quantity * price;

        // Update subtotal
        subtotalElement.textContent = '$' + totalPrice;

        // Update total price
        updateTotalPriceInCart();

        // Update hidden quantity input
        var hiddenQuantityInput = document.getElementById('hiddenQuantity' + productId);
        if (hiddenQuantityInput) {
            hiddenQuantityInput.value = quantity;
            // Send an AJAX request to update quantity in the database
            updateDatabaseQuantity(productId, quantity);
        }
    }

    function updateTotalPriceInCart() {
        // Update total price
        var total = 0;
        var subtotals = document.querySelectorAll('.subtotal');
        subtotals.forEach(function (subtotal) {
            total += parseFloat(subtotal.textContent.replace('$', ''));
        });
        document.getElementById('totalPrice').textContent = 'Total Price: $' + total;
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
    </body>

    </html>
