<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        .main {
            padding: 20px;
        }

        .content {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Enable horizontal scrolling on small screens */
            padding: 20px; /* Added padding */
        }

        .mb-3 h4 {
            margin-bottom: 0;
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

        .card-header {
            background : var(--bs-success);
            border-bottom: 1px solid #dee2e6;
        }

        .card-body {
            padding: 15px;
        }

        .card-body p {
            margin-bottom: 5px;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
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
            border: 1px solid #dee2e6;
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

        .cancel-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="main">
        <main class="content px-3 py-2">
            <div class="mb-3">
                <h4>Order Information</h4>
            </div>
            <div class="search-container">
                <input type="search" id="searchInput" placeholder="Search..." oninput="searchOrders()">
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    @foreach($orders as $order)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h6 class="card-title">Order ID: {{ $order->id }} - Status: {{ $order->status }}</h6>
                            </div>
                            <div class="card-body shadow p-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->orderItems as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td id="orderQuantity{{ $item->product->id }}">{{ $item->quantity }}</td>
                                            <td>${{ $item->price }}</td>
                                        </tr>
                                        <script>
                                            updateQuantityFromCart({{ $item->product->id }});
                                        </script>
                                    @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <p class="font-weight-bold text-end">
                                    Total Price: ${{ $order->total_amount }}
                                    @if($order->status === 'pending')
                                        <button class="cancel-btn" onclick="cancelOrder({{ $order->id }})">Cancel Order</button>
                                    @endif
                                    
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/script.js"></script>
    <script>
    function cancelOrder(orderId) {
        console.log('Cancel order function called for order ID:', orderId);

        if (confirm('Are you sure you want to cancel this order?')) {
            // Panggil endpoint untuk menghapus order
            fetch(`/cancel-order/${orderId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Order canceled!');
                    // Tambahkan SweetAlert success di sini
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Canceled!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    // Reload the page after successful deletion
                    location.reload();
                } else {
                    console.error('Failed to cancel order:', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }

        function searchOrders() {
            var searchTerm = document.getElementById("searchInput").value.toLowerCase();
            var cards = document.querySelectorAll('.card');

            cards.forEach(card => {
                const orderIdElements = card.querySelectorAll('.card-header .card-title');
                const productElements = card.querySelectorAll('.table tbody tr td:first-child');
                const totalPriceElement = card.querySelector('.font-weight-bold');
                const price = totalPriceElement.innerText.toLowerCase();

                let isMatch = false;

                orderIdElements.forEach(orderIdElement => {
                    const orderId = orderIdElement.innerText.toLowerCase();

                    if (orderId.includes(searchTerm)) {
                        isMatch = true;
                    }
                });

                productElements.forEach(productElement => {
                    const productName = productElement.innerText.toLowerCase();

                    if (productName.includes(searchTerm)) {
                        isMatch = true;
                    }
                });

                card.style.display = isMatch || price.includes(searchTerm) ? '' : 'none';
            });
        }
    </script>
</body>

<script>
    function updateQuantityFromCart(productId) {
        var cartQuantityInput = document.getElementById('quantity' + productId);
        var orderQuantityCell = document.getElementById('orderQuantity' + productId);

        if (cartQuantityInput && orderQuantityCell) {
            orderQuantityCell.textContent = cartQuantityInput.value;
        }
    }
</script>

</html>
