<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
		return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		$request->validate([
			'name'=> 'required|unique:categories,name',
			'description' => 'nullable|min:5|max:500',
		]);

		$category = new Category();
		$category->name = $request->name;
		$category->description = $request->description;
		$category->save();

		return to_route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
		return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
		$request->validate([
			'name'=> 'required|unique:categories,name,' . $category->id,
			'description' => 'nullable|min:5|max:500',
		]);

		$category->name = $request->name;
		$category->description = $request->description;
		$category->save();

		return to_route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
		$category->delete();
		return to_route('categories.index');
    }
}
