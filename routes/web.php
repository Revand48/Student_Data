<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', [UserController::class, 'index'])->name('beranda');
Route::get('/students', [UserController::class, 'index'])->name('students.index');
Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.store');

// -----------------------------
// Halaman Login Admin
// -----------------------------
Route::get('/adminlogin', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/adminlogin', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/adminlogout', [AuthController::class, 'logout'])->name('admin.logout');

// -----------------------------
// Halaman Dashboard (Hanya bisa diakses setelah login)
// -----------------------------
Route::middleware('auth.custom')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/list_contacts', [ContactController::class, 'index'])->name('dashboard.list_contacts');

    // CRUD Siswa untuk admin
    Route::get('siswa', [StudentController::class, 'index'])->name('siswa.index');
    Route::get('siswa/create', [StudentController::class, 'create'])->name('siswa.create');
    Route::post('siswa', [StudentController::class, 'store'])->name('siswa.store');
    Route::get('siswa/{siswa}/edit', [StudentController::class, 'edit'])->name('siswa.edit');
    Route::put('siswa/{siswa}', [StudentController::class, 'update'])->name('siswa.update');
    Route::delete('siswa/{siswa}', [StudentController::class, 'destroy'])->name('siswa.destroy');
});
