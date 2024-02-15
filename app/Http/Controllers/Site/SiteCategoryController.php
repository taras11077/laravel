<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use LiqPay;

class SiteCategoryController extends Controller
{
    public function index()
    {
		$title = 'Categories';
		$categories = Category::all();
		return view('main.categories', compact('title','categories'));
    }

	public function showProducts(Category $category)
    {  
		//$products = Product::where('category_id', '=' ,$category->id)->get();
		$products = $category->products()->get();	
        return view('main.products', compact('products', 'category'));
    }

	function product(Product $product){
		$order_id = time();
		$liqpay = new LiqPay(env('LIQPAY_PUBLIC'), env('LIQPAY_PRIVATE'));
		$html = $liqpay->cnb_form(array(
			'action'         => 'pay',
			'amount'         => '1', // $product->price
			'currency'       => 'UAH',
			'description'    => 'description text',
			'order_id'       => $order_id,
			'version'        => '3',
			'result_url'	 => route('pay.result', ['order_id' => $order_id])
		));

			return view('catalog.singleProduct', compact('product', 'html'));
	}
}

