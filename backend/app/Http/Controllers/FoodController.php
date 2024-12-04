<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Str;

class FoodController extends Controller
{
    // Method to fetch all foods
    public function index()
    {
        $foods = Food::all();

        return response()->json($foods);
    }

    // Method to create a new food with image upload
    public function create(Request $request)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imagePath = $file->store('foods', 'public');
            $imageUrl = url('storage/' . $imagePath);
        } else {
            return response()->json(['error' => 'Image upload failed'], 400);
        }

        $slug = Str::slug($request->title);

        $existingSlugCount = Food::where('slug', 'like', $slug . '%')->count();
        if ($existingSlugCount > 0) {
            $slug .= '-' . ($existingSlugCount + 1);
        }

        $food = Food::create([
            'img' => $imageUrl,
            'title' => $request->title,
            'slug' => $slug,
        ]);

        return response()->json($food,201);
}

}