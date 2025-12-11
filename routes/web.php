<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\WorkspaceController;



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

    Route::controller(SubscriptionController::class)->group(function () {
        Route::post('/purchase-plans', 'purchasePlan')->name('purchase.plan');
    });

    Route::middleware(['PurchasePlan'])->group(function () {

        Route::controller(UserController::class)->group(function () {
            Route::post('/lock', 'LockScreen')->name('user.lock');
            Route::post('/un-lock', 'unLockScreen')->name('user.unlock');
        });
        Route::get('/lock', function () {
            if (!session('isLocked')) {
                return redirect()->route('dashboard');
            }
            return view('user.v1.lock');
        });

        Route::middleware(['isLocked'])->group(function () {

            Route::controller(WorkspaceController::class)->group(function () {
                Route::get('/workspaces', 'index')->name('workspaces.index');
                Route::get('/get-workspace', 'getWorkspace')->name('get.workspaces');
                Route::post('/workspaces-selected', 'workspaceSelected')->name('workspaces.selected');
                Route::post('/create-workspace', 'createWorkspace')->name('workspace.create');
            });

            Route::middleware(['isWorkspace'])->group(function () {

                Route::controller(UserController::class)->group(function () {
                    Route::get('/dashboard', 'index')->name('dashboard');
                    Route::get('/profile', 'profileView')->name('user.profile');
                    Route::post('/upload-profile-image', 'uploadProfileImage')->name('upload.profile.image');
                    Route::post('/default-profile-image', 'defaultProfileImage')->name('default.profile.image');
                });

                Route::controller(ItemController::class)->group(function () {
                    Route::get('/items', 'index')->name('items.index');
                });

            });
        });

    });
});




require __DIR__ . '/auth.php';



Route::middleware(['auth:admin'])->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'dashboardView')->name('admin.dashboard');
    });
});



require __DIR__ . '/adminauth.php';



