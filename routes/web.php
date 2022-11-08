<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'usertype'])->group(function () {
    Route::get('/view_category', [AdminController::class, 'view_category'])->middleware('verified');

    Route::post('/add_category', [AdminController::class, 'add_category']);

    Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

    Route::get('/view_status', [AdminController::class, 'view_status']);

    Route::post('/add_status', [AdminController::class, 'add_status']);

    Route::get('/delete_status/{id}', [AdminController::class, 'delete_status']);

    Route::get('/view_product', [AdminController::class, 'view_product']);

    Route::get('/show_kh', [AdminController::class, 'show_kh']);

    Route::get('/show_nv', [AdminController::class, 'show_nv']);

    Route::get('/delete_user/{id}', [AdminController::class, 'delete_user']);

    Route::get('/view_cart', [AdminController::class, 'view_cart']);

    Route::get('/delete_gh/{id}', [AdminController::class, 'delete_gh']);

    Route::get('/show_hd', [AdminController::class, 'show_hd']);
    
    Route::get('/delete_hd/{id}', [AdminController::class, 'delete_hd']);

    Route::get('/show_cthd', [AdminController::class, 'show_cthd']);
    
    Route::get('/delete_cthd/{id}', [AdminController::class, 'delete_cthd']);

    Route::post('/add_hoadon', [AdminController::class, 'add_hoadon']);

    Route::get('/update_hoadon/{id}', [AdminController::class, 'update_hoadon']);

    Route::post('/edit_hoadon/{id}', [AdminController::class, 'edit_hoadon']);

    Route::get('/add_cthd', [AdminController::class, 'add_cthd']);

    Route::get('/add_user', [AdminController::class, 'add_user']);

    Route::post('/create_user', [AdminController::class, 'create_user']);

    Route::get('/update_user/{id}', [AdminController::class, 'update_user']);

    Route::post('/edit_user/{id}', [AdminController::class, 'edit_user']);



    Route::post('/add_cthoadon', [AdminController::class, 'add_cthoadon']);

    Route::get('/update_cthoadon/{id}', [AdminController::class, 'update_cthoadon']);

    Route::post('/edit_cthoadon/{id}', [AdminController::class, 'edit_cthoadon']);

    Route::post('/add_product', [AdminController::class, 'add_product']);

    Route::get('/show_product', [AdminController::class, 'show_product']);

    Route::get('/update_product/{id}', [AdminController::class, 'update_product']);

    Route::post('/edit_product/{id}', [AdminController::class, 'edit_product']);

    Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);

    Route::get('/add_hd', [AdminController::class, 'add_hd']);

    Route::get('/order', [AdminController::class, 'order']);

    Route::get('/delivery/{id}', [AdminController::class, 'delivery']);

    Route::get('/send_email/{id}', [AdminController::class, 'send_email']);

    Route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/redirect', [HomeController::class, 'redirect']);

    Route::get('/product_details/{id}', [HomeController::class, 'products_detail']);

    Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);

    Route::get('/show_cart', [HomeController::class, 'show_cart']);

    Route::get('/delete_cart/{id}', [HomeController::class, 'delete_cart']);

    Route::delete('/delete_select', [HomeController::class, 'delete_select']);

    Route::delete('/cash_order', [HomeController::class, 'cash_order']);

    Route::delete('/stripe', [HomeController::class, 'stripe']);

    Route::post('/stripe/{totalprice}', [HomeController::class, 'stripePost'])->name('stripe.post');

    Route::get('/show_order', [HomeController::class, 'show_order']);

    Route::get('/order_details/{id}', [HomeController::class, 'order_details']);

    Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);

    Route::get('/product_search', [HomeController::class, 'product_search']);

    Route::get('/product', [HomeController::class, 'product']);

    Route::get('/search_product', [HomeController::class, 'search_product']);
});