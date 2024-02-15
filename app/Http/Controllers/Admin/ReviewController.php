<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$reviews = Review::all();
		return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('admin.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		$request->validate([
			'title'=> 'required|unique:reviews,title',
			'content' => 'nullable|min:5|max:2000',
		]);

		$review = new Review();
		$review->title = $request->title;
		$review->content = $request->content;
		$review->save();

		return to_route('reviews.index');
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
    public function edit(Review $review)
    {
		return view('admin.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
		$request->validate([
			'title'=> 'required|unique:reviews,title,' . $review->id,
			'content' => 'nullable|min:5|max:1000',
		]);

		$review->title = $request->title;
		$review->content = $request->content;
		$review->save();

		return to_route('reviews.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
		$review->delete();
		return to_route('reviews.index');
    }
}
