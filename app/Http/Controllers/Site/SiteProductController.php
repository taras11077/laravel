<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteProductController extends Controller
{
    public function search(Request $request){
		$query = $request->input('query');
		$products = Product::where('name', 'like', "%$query%")->get();
		return view('main.products.search', compact('products', 'query'));
}
}
