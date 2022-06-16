<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\ExamtypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\UserController;
use App\Models\SchoolSubject;
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
    Route::post('/student/fee/amount_update/{fee_category_id}',[FeeAmountController::class,'feeAmountUpdate'])->name('feeamount.update');
    Route::get('/student/fee/amount_delete/{fee_category_id}',[FeeAmountController::class,'feeAmountDelete'])->name('feeamount.delete');
    Route::get('/student/fee/amount_details/{fee_category_id}',[FeeAmountController::class,'feeAmountDetails'])->name('feeamount.details');


    // Exam Type Route
    Route::get('/student/Examtype',[ExamtypeController::class,'ExamtypeView'])->name('examtype.view');
    Route::get('/student/Examtype_add',[ExamtypeController::class,'ExamtypeAdd'])->name('examtype.add');
    Route::post('/student/Examtype_store',[ExamtypeController::class,'ExamtypeStore'])->name('examtype.store');
    Route::get('/student/Examtype_edit/{id}',[ExamtypeController::class,'ExamtypeEdit'])->name('examtype.edit');
    Route::post('/student/Examtype_update/{id}',[ExamtypeController::class,'ExamtypeUpdate'])->name('examtype.update');
    Route::get('/student/Examtype_delete/{id}',[ExamtypeController::class,'ExamtypeDelete'])->name('examtype.delete');

    // School Subject Route
    Route::get('/school/subject',[SchoolSubjectController::class,'SchoolSubjectView'])->name('s_subject.view');
    Route::get('/school/subject_add',[SchoolSubjectController::class,'SchoolSubjectAdd'])->name('s_subject.add');
    Route::post('/school/subject_store',[SchoolSubjectController::class,'SchoolSubjectStore'])->name('s_subject.store');
    Route::get('/school/subject_edit/{id}',[SchoolSubjectController::class,'SchoolSubjectEdit'])->name('s_subject.edit');
    Route::post('/school/subject_update/{id}',[SchoolSubjectController::class,'SchoolSubjectUpdate'])->name('s_subject.update');
    Route::get('/school/subject_delete/{id}',[SchoolSubjectController::class,'SchoolSubjectDelete'])->name('s_subject.delete');

    // Assign Subject Route
    Route::get('/assign/subject',[AssignSubjectController::class,'AssignSubjectView'])->name('assign_subject.view');
    Route::get('/assign/subject_add',[AssignSubjectController::class,'AssignSubjectAdd'])->name('assign_subject.add');
    Route::post('/assign/subject_store',[AssignSubjectController::class,'AssignSubjectStore'])->name('assign_subject.store');
    Route::get('/assign/subject_edit/{class_id}',[AssignSubjectController::class,'AssignSubjectEdit'])->name('assign_subject.edit');
    Route::post('/assign/subject_update/{class_id}',[AssignSubjectController::class,'AssignSubjectUpdate'])->name('assign_subject.update');
    Route::get('/assign/subject_delete/{class_id}',[AssignSubjectController::class,'AssignSubjectDelete'])->name('assign_subject.delete');
    Route::get('/assign/subject_details/{class_id}',[AssignSubjectController::class,'AssignSubjectDetails'])->name('assign_subject.details');


    // Designation all route
    Route::get('/designation/view',[DesignationController::class,'DesignationView'])->name('designation.view');
    Route::get('/designation/add',[DesignationController::class,'DesignationAdd'])->name('designation.add');
    Route::post('/designation/store',[DesignationController::class,'DesignationStore'])->name('designation.store');
    Route::get('/designation/edit/{id}',[DesignationController::class,'DesignationEdit'])->name('designation.edit');
    Route::post('/designation/update/{id}',[DesignationController::class,'DesignationUpdate'])->name('designation.update');
    Route::get('/designation/delete/{id}',[DesignationController::class,'DesignationDelete'])->name('designation.delete');


});


// Student Management
Route::prefix('students')->group(function () {

    Route::get('/registration/view',[StudentRegController::class,'StudentRegView'])->name('student.reg.view');
    Route::get('/registration/add',[StudentRegController::class,'StudentRegAdd'])->name('student.reg.add');
    Route::post('/registration/store',[StudentRegController::class,'StudentRegStore'])->name('student.reg.store');



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
