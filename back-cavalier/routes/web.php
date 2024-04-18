<?php

use App\Http\Controllers\AnnoncesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::post('/inscription', [AuthController::class,'signup'])->name('signup');
Route::get('/', [AuthController::class,'connexion'])->name('auth.login');
Route::post('/connexion', [AuthController::class,'signin'])->name('signin');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::POST('/userRole', [UserController::class, 'changeRole'])->name('changeRole');
Route::get('/blocker/{id}', [UserController::class, 'blockUser'])->name('blockUser');



Route::get('/dashboard', [CategorieController::class, 'index'])->name('dashboard');
Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
Route::delete('/categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');

Route::get('/forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('/forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');



Route::get('/pageAnnonces', [AnnoncesController::class, 'index'])->name('annonces.index');
Route::get('/home', [HomeController::class, 'index'])->name('frentOffice.home');
Route::post('/annonces',[AnnoncesController::class, 'store'])->name('annonces.store');
Route::get('/annonces/{annonce}', [AnnoncesController::class, 'show'])->name('annonces.details');
Route::get('/annoncesDashbord', [AnnoncesController::class, 'dashIndex'])->name('annonces.dashIndex');
Route::delete('/annonces/{annonces}',[AnnoncesController::class, 'destroy'])->name('annonces.destroy');
Route::get('/annonces/{annonces}/edit',[AnnoncesController::class, 'edit'])->name('annonces.edit');
Route::put('/annonces/{annonces}',[AnnoncesController::class, 'update'])->name('annonces.update');

