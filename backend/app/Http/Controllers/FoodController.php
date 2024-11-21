<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $food = Food::all();

        return response()->json([
            'message' => 'Food fetched successfully',
            'food' => $food,
        ], 200);  // Changed status code to 200, as 201 is typically used for resource creation.
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'img' => 'required|image|max:2048',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        // Store the image
        $path = $request->file('img')->store('public/images');

        // Save the file path to the database
        $food = Food::create([
            'img' => $path, // Store the file path
            'title' => $request->title,
            'slug' => $request->slug,
        ]);

        return response()->json([
            'message' => 'Food inserted successfully',
            'food' => $food,
        ], 200);

        // return redirect()->back()->with('success', 'Food item created successfully.');
    }
}
