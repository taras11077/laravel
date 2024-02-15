<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Site\SiteCategoryController;
use App\Http\Controllers\Site\SiteProductController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('contacts', [MainController::class, 'contacts'])->name('contacts');
Route::post('contacts', [MainController::class, 'sendMessage'])->name('contacts.send');
Route::get('reviews', [MainController::class, 'reviews'])->name('reviews');
Route::get('categories', [SiteCategoryController::class, 'index'])->name('categories');
Route::get('category/{category}', [SiteCategoryController::class, 'showProducts'])->name('category.show');
Route::get('product/{product}', [SiteCategoryController::class, 'product'])->name('product');

Route::post('pay/result', [MainController::class, 'payResult'])->name('pay.result');

Route::get('products/search', [SiteProductController::class, 'search'])->name('products.search');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
	Route::resource('categories', CategoryController::class);
	Route::resource('reviews', ReviewController::class);
	Route::resource('products', ProductController::class);
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
	\UniSharp\LaravelFilemanager\Lfm::routes();
});

// Route::get('category/{category}', function(Category $category){
// 	dd($category);
// });

Auth::routes();

