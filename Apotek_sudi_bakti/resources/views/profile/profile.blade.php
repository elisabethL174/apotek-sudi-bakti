<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Akun Anda</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        /* Your existing styles go here */
    </style>
</head>
<body>
    <div class="container">
        <h1>Profil Akun Anda</h1>
        <form action="{{ route('profile.update') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nickname">Nick name</label>
                <input type="text" name="nickname" id="nickname" placeholder="Masukkan Nickname Anda" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan Email Anda" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Masukkan Username Anda" required>
            </div>
            <div class="form-group">
                <label for="level">Level Hak Akses</label>
                <input type="text" name="level" id="level" placeholder="Masukkan Level Hak Akses Anda" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
        
        <!-- Delete Account Form -->
        <form action="{{ route('profile.destroy') }}" method="post">
            @csrf
            @method('DELETE')
            <div class="form-group mt-3">
                <label for="password">Password untuk Konfirmasi</label>
                <input type="password" name="password" id="password" placeholder="Masukkan Password Anda" required>
            </div>
            <button type="submit" class="btn btn-danger">Hapus Akun</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
