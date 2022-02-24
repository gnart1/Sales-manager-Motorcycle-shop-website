<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\OrderController;
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
Route::get('/cars', function () {
    return view('web.cars');
});

Route::get('/contact', function () {
    return view('web.contact');
});

Route::get('/about', function () {
    return view('web.about');
});

Route::get('/blog', function () {
    return view('web.blog');
});

Route::get('/blog-detail', function () {
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

Route::get('/car-detail', function () {
    return view('web.car-detail');
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
		// Route::get('/create-admin', [CustomerController::class, 'create']);
		// Route::post('/create-admin', [CustomerController::class, 'store']);
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
		Route::get('/edit-order/{id}', [OrderController::class, 'edit']);
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

	// Route::get('typography', function () {
	// 	return view('pages.typography');
	// })->name('typography');
	// Route::get('customer', function () {
	// 	return view('pages.customer');
	// })->name('customer');
	
	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	// Route::get('map', function () {
	// 	return view('pages.map');
	// })->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');


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

//warehouse
// Route::get('/pages/table_list', [WarehouseController::class, 'index']);
