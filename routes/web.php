<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangayController;
use App\Http\Livewire\SMS;
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
})->name('home');

Route::get('/getmembership', function () {
    return view('pages.getMembership');
})->name('member');
Route::get('/getpension', function () {
    return view('pages.getpension');
})->name('pension');

Route::get('test', function() {
    Storage::disk('google')->put('test.txt', 'Hello World');
});
Route::get('SMS', SMS::class);

Route::get('/redirect', fn()=>view('login'))->middleware(['checkType', 'auth']);

//Admin
Route::middleware('osca')->prefix('admin')->group(function(){
Route::get('/', [AdminController::class, 'index'])->name('admin-dashboard');
Route::get('/applicant', [AdminController::class, 'applicant'])->name('admin-applicant');
Route::get('/member', [AdminController::class, 'member'])->name('admin-member');
Route::get('/settings', [AdminController::class, 'settings'])->name('admin-settings');
Route::get('/announcement', [AdminController::class, 'announcement'])->name('admin-announcement');
Route::get('/report', [AdminController::class, 'report'])->name('admin-report');
Route::get('/printId/{id}', [AdminController::class, 'printId'])->name('admin-printId');
Route::get('/print', [AdminController::class, 'print'])->name('admin-print');
});


//barangay
Route::middleware('barangay')->prefix('barangay')->group(function(){
Route::get('/', [BarangayController::class, 'index'])->name('barangay-dashboard');
Route::get('/applicants', [BarangayController::class, 'applicants'])->name('barangay-applicant');
Route::get('/members', [BarangayController::class, 'members'])->name('barangay-members');
Route::get('/report', [BarangayController::class, 'report'])->name('barangay-report');
Route::get('/announcement', [BarangayController::class, 'announcement'])->name('barangay-announcement');
Route::get('/settings', [BarangayController::class, 'settings'])->name('barangay-settings');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
