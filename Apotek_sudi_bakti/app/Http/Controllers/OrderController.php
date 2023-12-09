<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\HistoryTransaction;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::Where('status','!=', 'complete')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        if ($request->status == 'complete') {
            // Ensure all required fields are set for HistoryTransaction
            HistoryTransaction::create([
                'user_id' => $order->user_id,
                'order_id' => $order->id,
                'total_price' => $order->total_amount, // Replace this with the actual total price field
                'status' => $request->status,
            ]);           
        }  
        return back()->with('success', 'Order status updated successfully.');
    }

    public function myOrders()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->with('orderItems.product')->get();
     
        return view('myOrders', compact('orders'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        // Additional logic for order cancellation (if needed)

        $order->delete();

        return response()->json(['success' => true, 'message' => 'Order canceled successfully']);

    }
    
}


