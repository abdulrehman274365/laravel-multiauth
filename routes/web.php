<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;



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



Route::get('/', function () {
    return view('welcome');
})->name('index');


Route::controller(SubscriptionController::class)->group(function () {
    Route::get('/plans', 'index')->name('plans.index');
});
Route::middleware(['auth'])->group(function () {
    
    Route::controller(UserController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashbaord');
    });
    
    Route::controller(ItemController::class)->group(function () {
        Route::get('/items', 'index')->name('items.index');
    });
    
});




require __DIR__ . '/auth.php';



Route::middleware(['auth:admin'])->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'dashboardView')->name('admin.dashboard');
    });
});



require __DIR__ . '/adminauth.php';



