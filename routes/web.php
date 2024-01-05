<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.add-barangay');
});

Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.index');
Route::get('/admin/add/barangay', [AdminController::class, 'AdminAddBarangay'])->name('admin.add-barangay');
Route::post('/admin/add/barangay/person', [AdminController::class, 'AdminAddBarangayPerson'])->name('admin.add-barangayPerson');

Route::get('/admin/manage/barangay', [AdminController::class, 'AdminManageBarangay'])->name('admin.manage-barangay');

Route::get('/admin/add/senior', [AdminController::class, 'AdminAddSenior'])->name('admin.add-senior');
Route::get('/admin/manage/senior', [AdminController::class, 'AdminManageSenior'])->name('admin.manage-senior');

Route::get('/admin', [AdminController::class, 'Admin'])->name('admin');
Route::get('/admin/barangay', [AdminController::class, 'ViewBarangay'])->name('admin.barangay');

Route::get('/admin/age/report', [AdminController::class, 'AdminAgeReport'])->name('admin.age-report');
Route::get('/admin/barangay/report', [AdminController::class, 'ViewBarangayReport'])->name('admin.barangay-report');
Route::get('/admin/gender/report', [AdminController::class, 'AdminGenderReport'])->name('admin.gender-report');