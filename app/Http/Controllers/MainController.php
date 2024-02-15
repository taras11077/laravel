<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use LiqPay;


class MainController extends Controller
{
    function index() : View {
		$title = 'Main Page';

		$latestProducts = Product::orderBy("created_at","desc")->limit(8)->get();
		return view('index', compact('title','latestProducts'));
	}

	function contacts() : View {
		return view('main.contacts');
	}

	function sendMessage(Request $request) {
		$request->validate([
			'name' => 'required|min:3|max:32',
			'email' => 'required|email',
			'message' => 'required',
		]);

		//return $request->name;
		//dump($request->all());
		//dd($request->all());

		// ======= перенаправление после отправки форми =========
		//return redirect('/contacts');
		//return redirect('/contacts')->route('contacts');
		//return to_route('contacts');

		Mail::to('stg11077@mail.com')->send(new ContactMail($request->name, $request->email, $request->message));


		return back()->with('success', 'Thank!');
	}

	function reviews() : View {
		$title = 'Reviews';
		$reviews = Review::all();		
		return view('main.reviews', compact('title','reviews'));
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

	function payResult(Request $request){
		$sign = base64_encode( sha1( env('LIQPAY_PRIVATE') .  $request->data . env('LIQPAY_PRIVATE') , 1 ));

		if($sign === $request->signature){

			$liqpay = new LiqPay(env('LIQPAY_PUBLIC'), env('LIQPAY_PRIVATE'));
			$res = $liqpay->api('request', array(
				'action'         => 'status',
				'version'        => '3',
				'order_id'       => $request -> order_id,
			));

			if($res->status === 'success'){
				// DB
				// email
				dd($res->status);
			}
			dd($res->status);
		}else{
			dd('Error');
		}
	}
}
