<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        // Define the path to your JSON file
        $path = base_path('vue-food-app-composition-api-main/db/food-menu.json');
        
        // Check if the file exists
        if (!file_exists($path)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        // Read the JSON file
        $json = file_get_contents($path);
        
        // Decode the JSON data
        $data = json_decode($json, true);

        // Return the data as a JSON response
        return response()->json($data);
    }
}
