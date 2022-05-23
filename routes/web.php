<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;


// Admin logout route
Route::get('/admin/logout',[AdminController::class,'Logout'])->name('admin.logout');
Route::get('/', function () {
    return view('auth.login');
});

// User Management all Route
Route::prefix('users')->group(function(){

    Route::get('/view',[UserController::class,'UserView'])->name('user.view');
    Route::get('/add',[UserController::class,'AddUser'])->name('add.user');
    Route::post('/store',[UserController::class,'UserStore'])->name('users.store');



});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});
