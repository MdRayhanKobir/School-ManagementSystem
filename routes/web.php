<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;


// Admin logout route
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');
Route::get('/', function () {
    return view('auth.login');
});

// User Management all Route
Route::prefix('users')->group(function () {

    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/add', [UserController::class, 'AddUser'])->name('add.user');
    Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'EditUser'])->name('edit.user');
    Route::post('/update/{id}', [UserController::class, 'UpdateUser'])->name('update.user');
    Route::get('/delete/{id}', [UserController::class, 'DeleteUser'])->name('delete.user');
});

// User Profile and Change password
Route::prefix('profile')->group(function () {

    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('edit.profile');
    Route::post('/update', [ProfileController::class, 'ProfileUpdate'])->name('update.profile');
    Route::get('/password', [ProfileController::class, 'ProfilePassword'])->name('change.password');
    Route::post('/password/update', [ProfileController::class, 'ProfilePasswordUpdate'])->name('update.password');
});

// Setup management Route
Route::prefix('setup')->group(function () {

    Route::get('/student/class', [StudentClassController::class, 'StudentClass'])->name('student.class');
    Route::get('/student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('class.add');
    Route::post('/student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('class.store');
    Route::get('/student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('class.edit');
    Route::post('/student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('class.update');
    Route::get('/student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('class.delete');

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
