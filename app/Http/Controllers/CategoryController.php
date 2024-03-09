<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Category::create($validatedData);
        return back()->with('success', 'Category created successfully.');
    }

    public function update(Request $request)
    {
        $category = Category::find($request->category_id);
        $validatedData = $request->validate([
            'category_name' => 'required',
        ]);
        $category->name = $request->category_name;
        $category->save();
        return back()->with('success', 'Category updated successfully.');
    }

    public function destroy(Request $request)
    {
        $category = Category::find($request->category_id);
        $category->delete();
        return back()->with('success', 'Category deleted successfully.');
    }
}
