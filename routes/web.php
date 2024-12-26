<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserAuth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public routes (no auth required)
Route::get('/', [UserController::class, 'showlogin'])->name('user.showlogin');
Route::post('/checklogin', [UserController::class, 'checklogin'])->name('user.checklogin');
// Route::post('/forgot-pass',[UserController::class,'forgotpass'])->name('forget.password');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/data', [UserController::class, 'getData'])->name('users.data');
Route::get('/users/create',[UserController::class,'create'])->name('users.create');
Route::post('/users',[UserController::class,'store'])->name('users.store');
Route::get('users/{user}',[UserController::class,'show'])->name('users.show');
Route::get('/users/edit/{user}',[UserController::class,'edit'])->name('users.edit');
Route::put('/users/{user}',[UserController::class,'update'])->name('users.update');
Route::delete('/users/delete/{user}',[UserController::class,'destroy'])->name('users.destroy');
Route::get('/export-users',[UserController::class,'exportUsers'])->name('users.exportuser');
Route::post('/import-users',[UserController::class,'importdata'])->name('users.importdata');

// Route::resource('users', UserController::class);
Route::get('/get-states/{countryid}', [UserController::class, 'getstatebycountry'])->name('user.getstatebycountry');
Route::get('/get-city/{stateid}', [UserController::class, 'getcitybystate'])->name('user.getcitybystate');
Route::get('/select-city/{cityid}', [UserController::class, 'selectcity'])->name('user.selectcity');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
Route::post('/upload-image', [UserController::class, 'uploadimage'])->name('user.uploadimage');

Route::middleware([CheckUserAuth::class])->group(function () {
    
   
    
});

Route::get('forgotpass',[UserController::class,'showForgotPasswordForm'])->name('password.request');
Route::post('forgotpass',[UserController::class,'sendResetLink'])->name('password.email');
Route::get('reset-password/{token}',[UserController::class,'showResetPasswordForm'])->name('password.reset');
Route::post('reset-password', [UserController::class, 'resetPassword'])->name('password.update');
// Auth::routes(['verify' => true]);
// Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


