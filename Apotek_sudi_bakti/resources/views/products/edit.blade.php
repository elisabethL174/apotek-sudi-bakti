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
                                        onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item">
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
    <main class="container px-3 py-2">
        <div class="mb-3">
            <h4>Form Barang</h4>
        </div>
        <div class="card border-0">
                <div class="card-header">
                    <h7 class="card-titlefont-weight-bold custom-green-text">
                        Form Tambah Barang
                    </h7>
            </div>
    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="price">Stock:</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($product->image)
            <img src="{{ asset('storage/'.$product->image) }}" width="100px">
            @endif
        </div>
        <button type="submit" class="btn btn-primary btn-sm custom-button2">Update</button>
    </form>
</div>
</li>
                    </ul>
                </div>
            </nav>

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


