<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'domain_name' => 'required|string',
            'price' => 'required|numeric',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'company_name' => 'nullable|string',
            'street_address' => 'required|string',
            'street_address2' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'postcode' => 'required|string',
            'country' => 'required|string',
            'password' => 'required|string|min:5',
            'payment_method' => 'required|string',
        ]);

        // Create the order
        $order = Order::create($request->all());

        // Redirect to payment gateway or success page
        return response()->json([
            'status' => 'success',
            'message' => 'Order created successfully!',
            'order' => $order,
        ]);
    }

    // This method will handle the view action
    public function view($id)
    {
        // Find the order by its ID
        $order = Order::findOrFail($id);

        // Return the view with the order data
        return view('view_order', compact('order')); // Make sure this path matches your views/order/view_order.blade.php file
    }

    // This method will handle confirming the order
    public function confirm($id)
    {
        // Find the order by its ID
        $order = Order::findOrFail($id);

        // Logic to confirm the order, e.g., update status
        $order->status = 'active';
        $order->save();

        // Redirect back or to another page with a success message
        return redirect()->back()->with('success', 'Order confirmed!');
    }

    // This method will handle deleting an order
    public function destroy($id)
    {
        // Find the order by its ID
        $order = Order::findOrFail($id);

        // Delete the order
        $order->delete();

        // Redirect back or to another page with a success message
        return redirect()->back()->with('success', 'Order deleted successfully!');
    }
}
