<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="{{ route('home') }}" class="d-flex align-items-center pb-4 border-bottom border-dark">
                        <img src="LOGO SUDI BAKTI PUTIH.png" alt="" class="rounded img-fluid">
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
                            <i class='bx bxs-cart'></i>
                            Product
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class='bx bx-file-blank'></i>
                            Orders
                        </a>
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
                            <a href="#" data-bs-toggle="dropdown">
                                <div>{{ Auth::user()->name }} <i class='bx bx-chevron-down'></i> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{ route('profile.edit') }}" class="dropdown-item">{{ __('Profile') }}</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="mb-3">
                    <h4>Orders</h4>
                </div>
    <div class="search-container">
        <input type="search" id="searchInput" placeholder="Search..." oninput="searchOrders()">
    </div>
                <div class="card border-0">
                    <div class="card-header">
                        <h7 class="card-title font-weight-bold custom-green-text">
                            Orders
                        </h7>
                    </div>
                    <div class="card-body shadow p-2">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order ID</th>
                                        <th>Customer Name</th>
                                        <th>Email</th>
                                        <th>Products</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Table rows --}}
                                    @foreach ($orders as $index => $order)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $order->id}}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->user->email}} </td>
                                            <td>
                                                    @foreach ($order->orderItems as $item)
                                                        <li>{{ $item->product->name }} ({{ $item->quantity }})</li>
                                                    @endforeach
                                            </td>
                                            <td>{{ $order->orderItems->sum(function($item) { return $item->quantity * $item->product->price; }) }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>
                                                <form action="{{ route('orders.update', $order->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="status" class="form-select">
                                                        <option value="accepted" {{ $order->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                        <option value="complete" {{ $order->status == 'complete' ? 'selected' : '' }}>Complete</option>
                                                        <option value="cancel" {{ $order->status == 'cancel' ? 'selected' : '' }}>Cancel</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/js/script.js">
        </script>
        <script>
    function searchOrders() {
        // Ambil nilai pencarian
        var searchTerm = document.getElementById("searchInput").value.toLowerCase();

        // Ambil semua baris tabel
        var rows = document.querySelectorAll(".table tbody tr");

        // Loop melalui setiap baris tabel
        rows.forEach(function(row) {
            // Ambil kolom "Order ID", "Customer Name", dan "Email" dari setiap baris
            var orderID = row.cells[1].textContent.toLowerCase();
            var customerName = row.cells[2].textContent.toLowerCase();
            var email = row.cells[3].textContent.toLowerCase();

            // Periksa apakah nilai pencarian cocok dengan Order ID, nama pelanggan, atau email
            if (orderID.includes(searchTerm) || customerName.includes(searchTerm) || email.includes(searchTerm)) {
                // Tampilkan baris jika cocok
                row.style.display = "";
            } else {
                // Sembunyikan baris jika tidak cocok
                row.style.display = "none";
            }
        });
    }
</script>

    </body>
</html>