<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'food_menue_id' => 'nullable|exists:food_menues,id',  // Optional but should exist if provided
            'quantity' => 'required|integer|min:1',
            'total_price' => 'nullable|numeric|min:0',  // Use numeric for total_price (can be decimal)
            'full_name' => 'required|string|max:255',  // Full name is required
            'contact' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
        ]);

        // Attach the authenticated user's ID (if logged in)
        $validated['user_id'] = Auth::id();

        // Save the order to the database
        $order = Order::create($validated);

        // Respond with success or error
        return response()->json([
            'message' => 'Order placed successfully!',
            'order' => $order,
        ], 201);
    }
}
