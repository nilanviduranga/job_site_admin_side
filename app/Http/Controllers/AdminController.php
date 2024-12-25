<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function store_category(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $name = $request->name;
        $image = $request->image;
        $image_name = date('Ymd') . time() . $image->getClientoriginalName();
        $image->move(public_path('categoryImages'), $image_name);


        category::create([
            'category_name' => $name,
            'category_image' => $image_name,
        ]);

return;
        // return response()->json(['message' => 'Category added successfully']);
    }

    public function fetch_categories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
}
