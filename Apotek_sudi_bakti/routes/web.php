<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController; // Import ProductController
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

use App\Models\Product;

Route::get('/', function () {
    $products = Product::all(); // Fetch all products
    return view('welcome', ['products' => $products]);
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::middleware(['auth', 'admin'])->group(function () { // Move 'admin' middleware here
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes for CRUD operations using ProductController
    Route::resource('products', ProductController::class);

    // tomake admin status order change
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::patch('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    
    
});


Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/my-cart', [CartController::class, 'myCart'])->name('cart.myCart')->middleware('auth');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('orders.myOrders')->middleware('auth');



require __DIR__.'/auth.php';
