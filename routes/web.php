<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplyAsDoctorController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FrontController;

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::prefix('admin')
    ->as('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function (){
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/doctor_pending_list', [AdminController::class, 'doctor_in_pending_list'])->name('doctor_in_pending_list');
        Route::post('/store_doctor/{pending_doctor_id}', [AdminController::class, 'store_doctor'])->name('store_doctor');
        Route::get('/create_new_major', [AdminController::class, 'create_new_major'])->name('create_new_major');
        Route::post('/store_new_major', [AdminController::class, 'store_new_major'])->name('store_new_major');
        Route::put('/update/{major_id}', [AdminController::class, 'update_major'])->name('update_major');
        Route::delete('/destroy/{major_id}', [AdminController::class, 'destroy_major'])->name('destroy_major');
        Route::get('/download/certificate/{doctor_id}', [AdminController::class, 'download_certificate'])->name('download_certificate');
        Route::get('/download/clinic/license/{doctor_id}', [AdminController::class, 'download_clinic_license'])->name('download_clinic_license');
    });

Route::prefix('doctor')
    ->as('doctor.')
    ->middleware(['auth', 'doctor'])
    ->group(function (){
        Route::get('/', [DoctorController::class, 'index'])->name('index');
    });

Route::prefix('apply_as_doctor')
    ->as('apply_as_doctor.')
    ->middleware(['auth'])
    ->group(function (){
        Route::get('/', [ApplyAsDoctorController::class, 'create'])->name('create');
        Route::post('/store/in_pending_doctor', [ApplyAsDoctorController::class, 'store_pending_doctor'])->name('store_pending_doctor');
    });

Route::prefix('/')
    ->as('main.')
    ->middleware([])
    ->group(function(){
        Route::get('/', [FrontController::class, 'index'])->name('index');
    });
