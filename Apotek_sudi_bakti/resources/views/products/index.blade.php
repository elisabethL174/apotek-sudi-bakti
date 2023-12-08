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
                        <a href="{{ route('admin.orders.index') }}" class="sidebar-link">
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

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();" class="dropdown-item">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="mb-3">
                    <h4>Data Barang</h4>
                </div>
            <div class="card border-0">
                <div class="card-header">
                    <h7 class="card-titlefont-weight-bold custom-green-text">
                        Data Barang
                    </h7>
            </div>
            <div class="text-start mb-3">
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm custom-button">Tambah Barang</a>
                </div>
            <div class="cardbody shadow p-2"><table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Obat</th>
                            <th>Price</th>
                            <th>Deskripsi</th>
                            <th>Image</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->description }}</td>
                            <td><img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100px"></td>
                            <td>
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Edit</a>
                                <form id="deleteForm{{ $product->id }}"
                                    action="{{ route('products.destroy', $product) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger"
                                        onclick="confirmDelete({{ $product->id }})">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table></div>
            </div>
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/js/script.js"></script>
        <script>
            function confirmDelete(productId) {
                var confirmation = confirm("Are you sure you want to delete this product?");
                if (confirmation) {
                    document.getElementById('deleteForm' + productId).submit();
                }
            }
        </script>
    </body>
</html>
