<?php

namespace App\Http\Controllers;

use App\Models\FoodMenu;
use Illuminate\Http\Request;

class FoodmenuController extends Controller
{
    public function index()
    {
        $foodmenu = FoodMenu::all();

        return response()->json([
            'message' => 'FoodMenu fetched successfully',
            'foodmenu' => $foodmenu,
        ], 200);  // Changed status code to 200, as 201 is typically used for resource creation.
    }

    public function store(Request $request)
    {
        // Validate the request
        $a =$request->validate([
            'src' => 'required|image|max:2048',  // Ensure 'src' is an image file and does not exceed 2MB
            'title' => 'required|string|max:255', // 'title' must be a string and up to 255 characters
            'detail' => 'required|string|max:255', // 'detail' must be a string and up to 255 characters
            'price' => 'required|numeric|min:0',  // 'price' must be a numeric value and at least 0
        ]); 
        // Store the image
        $path = $request->file('src')->store('public/images');

        
        $foodmenu = FoodMenu::create([
            'src' => $path, 
            'title' => $request->title,
            'detail' => $request->detail,
            'price' => $request->price,
        ]);

        return response()->json([
            'message' => 'Food menu inserted successfully',
            'foodmenu' => $foodmenu,
        ], 200);

        // return redirect()->back()->with('success', 'Food item created successfully.');
}
}