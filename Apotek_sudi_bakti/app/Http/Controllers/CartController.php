<?php
namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\Order;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $user = Auth::user();
        $product = Product::findOrFail($productId);

        CartItem::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);

        return back()->with('success', 'Product added to cart!');
    }

    public function myCart()
    {
        $user = Auth::user();
        $cartItems = CartItem::where('user_id', $user->id)->get();

        return view('myCart', compact('cartItems'));
    }

    public function checkout()
    {
        $user = Auth::user();
        $cartItems = CartItem::where('user_id', $user->id)->get();

        // Calculate total amount
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Create an order
        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => $totalAmount,
            'status' => 'pending'
        ]);

        // Add each cart item to the order_items table
        foreach ($cartItems as $item) {
            $order->orderItems()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ]);
        }

        // Clear the cart
        CartItem::where('user_id', $user->id)->delete();
        return back()->with('success', 'Checkout successful!');
    }

    public function updateQuantity(Request $request, $productId)
    {
        // Validate the request
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $user = auth()->user();

        // Find the cart item for the given product and user
        $cartItem = CartItem::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if (!$cartItem) {
            return response()->json(['error' => 'Cart item not found'], 404);
        }

        // Update the quantity
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return response()->json(['success' => 'Quantity updated successfully']);
    }

    public function removeProduct($productId)
{
    $user = auth()->user();

    // Find the cart item for the given product and user
    $cartItem = CartItem::where('user_id', $user->id)
        ->where('product_id', $productId)
        ->first();

    if (!$cartItem) {
        return response()->json(['error' => 'Product not found in the cart'], 404);
    }

    // Delete the cart item
    $cartItem->delete();

    // Provide a success response
    return response()->json(['success' => 'Product removed from the cart']);
}
}
