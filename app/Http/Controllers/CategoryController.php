<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
            'description' => ['required', 'string', 'max:255']
        ]);

        $category = new Category;

        $category->name = $request->name;
        $category->description = $request->description;
        $category->is_active = $request->is_active == true ? 1 : 0;

        $category->save();

        return redirect('categories/create')->with('status', 'Category created!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request...
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255']
        ]);

        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->is_active = $request->is_active == true ? 1 : 0;

        $category->save();

        return redirect('categories/' . $id . '/edit')->with('status', 'Category updated!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect('categories')->with('status', 'Category deleted!');
    }
}
