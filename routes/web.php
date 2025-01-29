<?php

use App\Http\Middleware\isLogin;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Fitur\ProfilController;
use App\Http\Controllers\Role\AdminController;
use App\Http\Controllers\Role\DokterController;
use App\Http\Controllers\Role\PasienController;
use App\Http\Controllers\Role\ManajerController;
use App\Http\Controllers\Role\PerawatController;
use App\Http\Controllers\Role\AdministrasiController;
use App\Http\Controllers\Role\ApotekerController;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::controller(AuthController::class)->group(function () {
//     Route::get('/login', 'login')->name('login');
//     Route::post('/login', 'login_action')->name('login_action');
//     Route::get('/register', 'register')->name('register');
//     Route::post('/register', 'register_action')->name('register_action');
    
// });
Route::middleware(['guest'])->group(function () {
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/login',[AuthController::class,'login_action'])->name('login_action');
    Route::get('/register',[AuthController::class,'register'])->name('register');
    Route::post('/register',[AuthController::class,'register_action'])->name('register_action');
    //Route::post('/login', 'login_action')->name('login_action');
    //Route::get('/register', 'register')->name('register');
    //Route::post('/register', 'register_action')->name('register_action');
});

Route::middleware(['auth'])->group(function () {
    //Route::get('/guru/dashboard', [HomeController::class, 'guruView'])->middleware('role:guru')->name('guru');
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/profile',[ProfilController::class,'index'])->name('profil');
    // /Route::get('/profile/update',[ProfilController::class,'update'])->name('profil');
    // Rute untuk memperbarui pengguna yang ada
    Route::put('/profile/{$id}', [AuthController::class, 'update'])->name('profile.update');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});

Route::middleware(['auth'])->prefix('dokter')->group(function () {  
    Route::get('dashboard', [DokterController::class, 'dokterDashboard'])->middleware('role:dokter')->name('dokter');
});
Route::middleware(['auth'])->prefix('admin')->group(function () {  
    Route::get('dashboard', [AdminController::class, 'index'])->middleware('role:admin')->name('admin.dashboard');
});  
Route::middleware(['auth'])->prefix('administrasi')->group(function () {  
    Route::get('dashboard', [AdministrasiController::class, 'administrasiDashboard'])->middleware('role:administrasi')->name('administrasi');
   
});  
Route::middleware(['auth'])->prefix('pasien')->group(function () {  
    Route::get('dashboard', [PasienController::class, 'pasienDashboard'])->middleware('role:pasien')->name('pasien');
   
});  
Route::middleware(['auth'])->prefix('manajer')->group(function () {  
    Route::get('dashboard', [ManajerController::class, 'manajerDashboard'])->middleware('role:manajer')->name('manajer');
});  
Route::middleware(['auth'])->prefix('apoteker')->group(function () {  
    Route::get('dashboard', [ApotekerController::class, 'apotekerDashboard'])->middleware('role:apoteker')->name('apoteker');
});  
Route::middleware(['auth'])->prefix('perawat')->group(function () {  
    Route::get('dashboard', [PerawatController::class, 'perawatDashboard'])->middleware('role:perawat')->name('perawat');
});    

