<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/sidebar', function () {
    return view('layouts.inc.frontend-sidebar');
});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);

Route::middleware('auth')->group(function () {

    Route::get('profile/{user_id}', [App\Http\Controllers\Frontend\ProfileController::class, 'index']);
    Route::get('profile/edit/{user_id}', [App\Http\Controllers\Frontend\ProfileController::class, 'edit']);
    Route::put('profile/update/{user_id}', [App\Http\Controllers\Frontend\ProfileController::class, 'update']);
    Route::post('profile/add/{user_id}', [App\Http\Controllers\Frontend\ProfileController::class, 'store']);

    Route::get('medical/{user_id}', [App\Http\Controllers\Frontend\MedicalRecordController::class, 'index']);
   

    Route::get('lab-result/{user_id}', [App\Http\Controllers\Frontend\LabResultController::class, 'index']);

    Route::get('locations', [App\Http\Controllers\Frontend\LocationController::class, 'index']);
    Route::get('locations/{location_id}', [App\Http\Controllers\Frontend\LocationController::class, 'show']);

    Route::get('department/{department_id}', [App\Http\Controllers\Frontend\SingleDeptController::class, 'index']);
    Route::get('departments', [App\Http\Controllers\Frontend\AllDepartmentController::class, 'index']);

   
    Route::get('my-appointment/{user_id}', [App\Http\Controllers\Frontend\MyAppointmentController::class, 'index']);

    Route::get('set-appointment/{user_id}', [App\Http\Controllers\Frontend\SetAppointmentController::class, 'create']);

    Route::get('/doc-by-dept', [App\Http\Controllers\Frontend\SetAppointmentController::class, 'doctorsByDepartment']);
    Route::get('/dept-by-loc', [App\Http\Controllers\Frontend\SetAppointmentController::class, 'DepartmentsByLocation']);
    Route::get('/get-doc-sched', [App\Http\Controllers\Frontend\SetAppointmentController::class, 'DoctorSchedule']);

    Route::post('set-appointment/{user_id}', [App\Http\Controllers\Frontend\SetAppointmentController::class, 'store']);

    
});


Route::prefix('admin')->middleware('is_admin')->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);


    Route::get('location', [App\Http\Controllers\Admin\LocationController::class, 'index']);
    Route::get('add-location', [App\Http\Controllers\Admin\LocationController::class, 'create']);
    Route::post('add-location', [App\Http\Controllers\Admin\LocationController::class, 'store']);
    Route::get('edit-location/{location_id}', [App\Http\Controllers\Admin\LocationController::class, 'edit']);
    Route::put('update-location/{location_id}', [App\Http\Controllers\Admin\LocationController::class, 'update']);
    Route::get('delete-location/{location_id}', [App\Http\Controllers\Admin\LocationController::class, 'destroy']);

    Route::get('department', [App\Http\Controllers\Admin\DepartmentController::class, 'index']);
    Route::get('add-department', [App\Http\Controllers\Admin\DepartmentController::class, 'create']);
    Route::post('add-department', [App\Http\Controllers\Admin\DepartmentController::class, 'store']);
    Route::get('edit-department/{department_id}', [App\Http\Controllers\Admin\DepartmentController::class, 'edit']);
    Route::put('update-department/{department_id}', [App\Http\Controllers\Admin\DepartmentController::class, 'update']);
    Route::get('delete-department/{department_id}', [App\Http\Controllers\Admin\DepartmentController::class, 'destroy']);

    
    Route::get('doctor', [App\Http\Controllers\Admin\DoctorController::class, 'index']);
    Route::get('add-doctor', [App\Http\Controllers\Admin\DoctorController::class, 'create']);
    Route::post('add-doctor', [App\Http\Controllers\Admin\DoctorController::class, 'store']);
    Route::get('edit-doctor/{doctor_id}', [App\Http\Controllers\Admin\DoctorController::class, 'edit']);
    Route::put('update-doctor/{doctor_id}',[App\Http\Controllers\Admin\DoctorController::class, 'update']);
    Route::get('delete-doctor/{doctor_id}',[App\Http\Controllers\Admin\DoctorController::class, 'destroy']);

    Route::get('patients', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::get('edit-patient/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::put('update-patient/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update']);
    

    Route::get('appointments', [App\Http\Controllers\Admin\AppointmentController::class, 'index']);
    Route::get('add-appointment', [App\Http\Controllers\Admin\AppointmentController::class, 'create']);
    Route::post('add-appointment', [App\Http\Controllers\Admin\AppointmentController::class, 'store']);
    Route::get('appointment/{appointment_id}', [App\Http\Controllers\Admin\AppointmentController::class, 'edit']);
    Route::put('update-appointment/{appointment_id}', [App\Http\Controllers\Admin\AppointmentController::class, 'update']);

    Route::get('/doctors-by-department', [App\Http\Controllers\Admin\AppointmentController::class, 'getDoctorsByDepartment']);
    Route::get('/departments-by-location', [App\Http\Controllers\Admin\AppointmentController::class, 'getDepartmentsByLocation']);
    Route::get('/get-doctor-schedule', [App\Http\Controllers\Admin\AppointmentController::class, 'getDoctorSchedule']);
    
    Route::get('records', [App\Http\Controllers\Admin\RecordController::class, 'index']);
    Route::get('add-record', [App\Http\Controllers\Admin\RecordController::class, 'create']);
    Route::post('add-record', [App\Http\Controllers\Admin\RecordController::class, 'store']);
    Route::get('view-record/{record_id}', [App\Http\Controllers\Admin\RecordController::class, 'view']);
    Route::get('records/{record_id}/edit', [App\Http\Controllers\Admin\RecordController::class, 'edit']);
    Route::put('records/{record_id}', [App\Http\Controllers\Admin\RecordController::class, 'update']);
    Route::get('delete-record/{record_id}',[App\Http\Controllers\Admin\RecordController::class, 'destroy']);
    
    

});