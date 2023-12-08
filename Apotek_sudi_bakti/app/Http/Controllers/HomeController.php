<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Fetch all products

        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user') {
                return view('dashboard', ['products' => $products]); // Pass products to the dashboard view for users
            } else if ($usertype == 'admin') {
                return view('admin.adminhome'); // Admin view
            }
        }

        return redirect()->back(); // Redirect if not authenticated
    }
}
