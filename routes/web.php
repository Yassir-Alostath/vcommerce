<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\Admin\DashboardController;

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


Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function (){
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::Resource('categories', CategoryController::class); //admin.categories.index
    Route::Resource('products', ProductController::class); //admin.products.index
    Route::Resource('discounts', DiscountController::class); //admin.discounts.index
    Route::delete('delete_all', [CategoryController::class, 'delete_all'])->name('delete_all');
});
/*
** The source Route does the following Routes  **
Get categories
Get categories/create
POST categories
Get categories/{category}
Get categories/{category}/edit
PUT categories/{category}
DELETE categories/{category}
*/


Route::get('/user', function () {
    return ('This is User Area');
})->middleware('auth', 'verified');

Auth::routes([/*'register'=>false, */'verify'=>true /* , 'login'=>false*/]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
