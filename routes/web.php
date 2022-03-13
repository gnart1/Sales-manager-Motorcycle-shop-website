<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Category;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductDetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//web-----------------------------

Route::get('/', function () {
	return view('web.home');
});

Route::get('/cars', [Category::class,'index']);

Route::get('/car-details/{id}', [Category::class,'indexdetail']);

Route::get('/accessary', [Category::class,'indexaccessary']);
Route::get('/helmet', [Category::class,'indexhelmet']);
Route::get('/caroil', [Category::class,'indexcaroil']);

// Route::get('/accessary', function () {
// 	return view('web.accessary');
// });
Route::get('/contact', function () {
	return view('web.contact');
});

Route::get('/about', function () {
	return view('web.about');
});

Route::get('/blog', function () {
	return view('web.blog');
});

Route::get('/blogDetail', function () {
	return view('web.blog-detail');
});

Route::get('/team', function () {
	return view('web.team');
});

Route::get('/testimonials', function () {
	return view('web.testimonials');
});

Route::get('/faq', function () {
	return view('web.faq');
});

Route::get('/terms', function () {
	return view('web.terms');
});



//-------------------------------



Route::get('/admin', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	// Route::get('table-list', function () {
	// 	return view('pages.table_list');
	// })->name('table');
	//warehouse
	Route::prefix('/admin')->group(function () {

		Route::get('/', [AdminController::class, 'index'])->name('admin');
		Route::get('/create-admin', [AdminController::class, 'create']);
		Route::post('/create-admin', [AdminController::class, 'store']);
		Route::get('/edit-admin/{id}', [AdminController::class, 'edit']);
		Route::post('/edit-admin/{id}', [AdminController::class, 'update']);
		Route::get('/delete-admin/{id}', [AdminController::class, 'destroy']);
	});
	Route::prefix('/customer')->group(function () {

		Route::get('/', [CustomerController::class, 'index'])->name('customer');
		Route::get('/create-customer', [CustomerController::class, 'create']);
		Route::post('/create-customer', [CustomerController::class, 'store']);
		// Route::get('/edit-admin/{id}', [CustomerController::class, 'edit']);
		// Route::post('/edit-admin/{id}', [CustomerController::class, 'update']);
		Route::get('/delete-admin/{id}', [CustomerController::class, 'destroy']);
	});

	Route::prefix('/warehouse')->group(function () {

		Route::get('/', [WarehouseController::class, 'index'])->name('table');
		Route::get('/create-warehouse', [WarehouseController::class, 'create']);
		Route::post('/create-warehouse', [WarehouseController::class, 'store']);
		Route::get('/edit-warehouse/{id}', [WarehouseController::class, 'edit']);
		Route::post('/edit-warehouse/{id}', [WarehouseController::class, 'update']);
		Route::get('/delete-warehouse/{id}', [WarehouseController::class, 'destroy']);
	});
	Route::prefix('/product')->group(function () {

		Route::get('/', [ProductController::class, 'index'])->name('product');
		Route::get('/create-product', [ProductController::class, 'create']);
		Route::post('/create-product', [ProductController::class, 'store']);
		Route::get('/edit-product/{id}', [ProductController::class, 'edit']);
		Route::post('/edit-product/{id}', [ProductController::class, 'update']);
		Route::get('/delete-product/{id}', [ProductController::class, 'destroy']);
	});
	Route::prefix('/order')->group(function () {

		Route::get('/', [OrderController::class, 'index'])->name('order');
		Route::get('/create-order', [OrderController::class, 'create']);
		Route::post('/create-order', [OrderController::class, 'store']);
		Route::get('/edit-order/{id}/{type}', [OrderController::class, 'edit']);
		Route::post('/edit-order/{id}', [OrderController::class, 'update']);
		Route::get('/delete-order/{id}', [OrderController::class, 'destroy']);
	});
	Route::prefix('/supplier')->group(function () {

		Route::get('/', [SupplierController::class, 'index'])->name('supplier');
		Route::get('/create-supplier', [SupplierController::class, 'create']);
		Route::post('/create-supplier', [SupplierController::class, 'store']);
		Route::get('/edit-supplier/{id}', [SupplierController::class, 'edit']);
		Route::post('/edit-supplier/{id}', [SupplierController::class, 'update']);
		Route::get('/delete-supplier/{id}', [SupplierController::class, 'destroy']);
	});
	Route::prefix('/productdetail')->group(function () {

		Route::get('/', [ProductDetailController::class, 'index'])->name('productdetail');
		Route::get('/create-product-detail', [ProductDetailController::class, 'create']);
		Route::post('/create-product-detail', [ProductDetailController::class, 'store']);
		Route::post('/create-product-detail2', [ProductDetailController::class, 'storeChoose']);
		// Route::get('/edit-supplier/{id}', [SupplierController::class, 'edit']);
		// Route::post('/edit-supplier/{id}', [SupplierController::class, 'update']);
		// Route::get('/delete-supplier/{id}', [SupplierController::class, 'destroy']);

	});
	Route::prefix('/orderdetail')->group(function () {

		Route::get('/', [OrderDetailController::class, 'index'])->name('orderdetail');
		Route::get('/create-order-detail', [OrderDetailController::class, 'create']);
		Route::post('/create-order-detail', [OrderDetailController::class, 'store']);
		Route::post('/create-order-detail2', [OrderDetailController::class, 'storeChoose']);
		// Route::get('/edit-supplier/{id}', [SupplierController::class, 'edit']);
		// Route::post('/edit-supplier/{id}', [SupplierController::class, 'update']);
		// Route::get('/delete-supplier/{id}', [SupplierController::class, 'destroy']);

	});



	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

//galley
// Route::prefix('/gallery')->group(function () {
// Route::get('/add-gallery/{idProduct}', [GalleryController::class, 'add_gallery']);
// Route::post('select-gallery', [GalleryController::class, 'select_gallery']);
// });