<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodMenue;
use Illuminate\Support\Facades\Log;

class FoodMenuController extends Controller
{
    // Method to fetch all foods
    public function index()
    {
        $foods = FoodMenue::all();

        return response()->json($foods);
    }

    // Method to create a new food with image upload
    public function create(Request $request)
    {
        $request->validate([
            'src' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'details' => 'required|string',
            'price' => 'required',
        ]);

        if ($request->hasFile('src')) {
            $file = $request->file('src');
            $imagePath = $file->store('food-menues', 'public');
            $imageUrl = url('storage/' . $imagePath);
        } else {
            return response()->json(['error' => 'Image upload failed'], 400);
        }

        $food = FoodMenue::create([
            'src' => $imageUrl,
            'title' => $request->title,
            'details' => $request->details,
            'price' => $request->price,
        ]);

        return response()->json($food, 201);
    }
    public function search(Request $request)
{
    $query = FoodMenue::query();

    if ($request->has('search')) {
        $searchValue = $request->search;
        Log::info('Search value: ' . $searchValue); // Log the search query
        $query->where('title', 'like', '%' . trim(strtolower($request->search)) . '%');
    }

    $results = $query->get();
    Log::info('Query results: ' . $results);

    return response()->json($results);
}
}
