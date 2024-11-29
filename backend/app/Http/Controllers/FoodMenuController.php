<?php

namespace App\Http\Controllers;

use App\Models\FoodMenu;
use Illuminate\Http\Request;

class FoodMenuController extends Controller
{
    public function index()
    {
        $foodmenu = FoodMenu::all();
        return response()->json(['message' => 'Foods fetched successfully', 'data' => $foodmenu], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'src' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'title' => 'required|string|max:255',
            'details' => 'required|string|max:255',  
            'price' => 'required|numeric|min:0',
        ]);
        if ($request->hasFile('src')) {
            $file = $request->file('src');
            $imagePath = $file->store('food-menues', 'public');
            $imageUrl = url('storage/' . $imagePath);
        } else {
            return response()->json(['error' => 'Image upload failed'], 400);
        }
    
        // Create the food item
        $foodmenu = FoodMenu::create([
            'src' => $imageUrl,  // Save the image path in the database
            'title' => $validated['title'],
            'details' => $validated['details'],
            'price' => $validated['price'],
        ]);
    
        return response()->json([
            'message' => 'Food created successfully',
            'data' => $foodmenu
        ], 201);
    }
}
