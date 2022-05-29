<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
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

    // student year route
    Route::get('/student/year_view', [StudentYearController::class, 'StudentYearView'])->name('studentyear.view');
    Route::get('/student/year_add', [StudentYearController::class, 'StudentYearAdd'])->name('student_year.add');
    Route::post('/student/year_store', [StudentYearController::class, 'StudentYearStore'])->name('student_year.store');
    Route::get('/student/year_edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student_year.edit');
    Route::post('/student/year_update/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('student_year.update');
    Route::get('/student/year_delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student_year.delete');

    // Student Group
    Route::get('/student/group_view',[StudentGroupController::class,'StudentGroup'])->name('studentgroup.view');
    Route::get('/student/group_add',[StudentGroupController::class,'StudentGroupAdd'])->name('studentgroup.add');
    Route::post('/student/group_store',[StudentGroupController::class,'StudentGroupStore'])->name('student_group.store');
    Route::get('/student/group_edit/{id}',[StudentGroupController::class,'StudentGroupEdit'])->name('student_group.edit');
    Route::post('/student/group_update/{id}',[StudentGroupController::class,'StudentGroupUpdate'])->name('student_group.update');
    Route::get('/student/group_delete/{id}',[StudentGroupController::class,'StudentGroupDelete'])->name('student_group.delete');

    //  Student Shift
    Route::get('/student/shift_view',[StudentShiftController::class,'StudentShiftView'])->name('shift.view');
    Route::get('/student/shift_add',[StudentShiftController::class,'StudentShiftAdd'])->name('shift.add');
    Route::post('/student/shift_store',[StudentShiftController::class,'StudentShiftStore'])->name('shift.store');
    Route::get('/student/shift_edit/{id}',[StudentShiftController::class,'StudentShiftEdit'])->name('shift.edit');
    Route::post('/student/shift_update/{id}',[StudentShiftController::class,'StudentShiftUpdate'])->name('shift.update');
    Route::get('/student/shift_delete/{id}',[StudentShiftController::class,'StudentShiftDelete'])->name('shift.delete');

    // student feeCategory Route
    Route::get('/student/fee_category_view',[FeeCategoryController::class,'FeeCategory'])->name('fee_category.view');
    Route::get('/student/fee_category_add',[FeeCategoryController::class,'FeeCategoryAdd'])->name('fee_category.add');
    Route::post('/student/fee_category_store',[FeeCategoryController::class,'FeeCategoryStore'])->name('fee_category.store');
    Route::get('/student/fee_category_edit/{id}',[FeeCategoryController::class,'FeeCategoryEdit'])->name('fee_category.edit');
    Route::post('/student/fee_category_update/{id}',[FeeCategoryController::class,'FeeCategoryUpdate'])->name('fee_category.update');
    Route::get('/student/fee_category_delete/{id}',[FeeCategoryController::class,'FeeCategoryDelete'])->name('fee_category.delete');

    // Fee Amount Route
    Route::get('/student/fee/amount',[FeeAmountController::class,'feeAmountView'])->name('feeamount.view');
    Route::get('/student/fee/amount_add',[FeeAmountController::class,'feeAmountAdd'])->name('feeamount.add');
    Route::post('/student/fee/amount_store',[FeeAmountController::class,'feeAmountStore'])->name('feeamount.store');
    Route::get('/student/fee/amount_edit/{fee_category_id}',[FeeAmountController::class,'feeAmountEdit'])->name('feeamount.edit');

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
