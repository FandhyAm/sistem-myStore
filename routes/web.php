<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductsController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\DashboardTransactionsController;
use App\Models\ProductGallery;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/{id}', [CategoryController::class, 'detail'])->name('category-detail');

Route::get('/details/{id}', [DetailController::class, 'index'])->name('detail');
Route::post('/details/{id}', [DetailController::class, 'add'])->name('detail-add');

Route::get('/success', [CartController::class, 'success'])->name('success');

Route::get('/register/success', [RegisterController::class, 'success'])->name('register-success');

// route for user login
Route::group(['middleware' => ['auth']], function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart-delete');

    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout');
    Route::post('/checkout/callback', [CheckoutController::class, 'callback'])->name('midtrans-callback');

    Route::get('/dashboard-page', [DashboardController::class, 'index'])->name('dashboard-page');

    Route::get('/dashboard-page/product', [DashboardProductsController::class, 'index'])->name('dashboard-product');
    Route::get('/dashboard-page/product/create', [DashboardProductsController::class, 'create'])->name('dashboard-product-create');
    Route::post('/dashboard-page/product', [DashboardProductsController::class, 'store'])->name('dashboard-product-store');
    Route::get('/dashboard-page/product/{id}', [DashboardProductsController::class, 'detail'])->name('dashboard-product-detail');
    Route::post('/dashboard-page/product/{id}', [DashboardProductsController::class, 'update'])->name('dashboard-product-update');

    Route::post('/dashboard-page/upload', [DashboardProductsController::class, 'uploadGallery'])->name('dashboard-product-gallery-upload');
    Route::get('/dashboard-page/product/delete/{id}', [DashboardProductsController::class, 'deleteGallery'])->name('dashboard-product-gallery-delete');

    Route::get('/dashboard-page/transactions', [DashboardTransactionsController::class, 'transactions'])->name('dashboard-transactions');
    Route::get('/dashboard-page/transactions/{id}', [DashboardTransactionsController::class, 'details'])->name('dashboard-transactions-details');
    Route::post('/dashboard-page/transactions/{id}', [DashboardTransactionsController::class, 'update'])->name('dashboard-transactions-update');


    Route::get('/dashboard-page/setting', [DashboardSettingController::class, 'store'])->name('dashboard-setting-store');
    Route::get('/dashboard-page/account', [DashboardSettingController::class, 'account'])->name('dashboard-setting-account');
    Route::post('/dashboard-page/account/{redirect}', [DashboardSettingController::class, 'update'])->name('dashboard-setting-redirect');
});

// Route admin
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin-dashboard');
        Route::resource('category', AdminCategoryController::class);
        Route::resource('user', UserController::class);
        Route::resource('product', ProductController::class);
        Route::resource('product-gallery', ProductGalleryController::class);
        Route::resource('transaction', TransactionController::class);
    });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
