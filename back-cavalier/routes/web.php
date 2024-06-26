<?php

use App\Http\Controllers\AnnoncesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;
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
Route::get('/login', [AuthController::class,'connexion'])->name('auth.login');
Route::post('/connexion', [AuthController::class,'signin'])->name('signin');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware([UserMiddleware::class])->group(function () {
    Route::put('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::get('EditeProfil', [AuthController::class, 'EditeProfil'])->name('user.EditeProfil');
    Route::get('/annoncesDashbord', [AnnoncesController::class, 'dashIndex'])->name('annonces.dashIndex');
    Route::post('/annonces',[AnnoncesController::class, 'store'])->name('annonces.store');
    Route::delete('/annonces/{annonce}',[AnnoncesController::class, 'destroy'])->name('annonces.destroy');
    Route::get('/annonces/{annonces}/edit',[AnnoncesController::class, 'edit'])->name('annonces.edit');
    Route::put('/annonces/{annonce}', [AnnoncesController::class, 'update'])->name('annonces.update');
    Route::get('/commentaires/{commentId}/edit', [CommentaireController::class, 'edit'])->name('commentaires.edit');
    Route::post('/commentaires/{annonceId}', [CommentaireController::class, 'store'])->name('commentaires.store');
    Route::put('/commentaires/{commentId}', [CommentaireController::class, 'update'])->name('commentaires.update');
    Route::delete('/commentaires/{commentId}', [CommentaireController::class, 'delete'])->name('commentaires.delete');
    Route::get('/statistiques', [AnnoncesController::class, 'statistiqueUser'])->name('statistiqueUser');

});

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [CategorieController::class, 'index'])->name('dashboard');
    Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
    Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::POST('/userRole', [UserController::class, 'changeRole'])->name('changeRole');
    Route::get('/blocker/{id}', [UserController::class, 'blockUser'])->name('blockUser');
    Route::get('/stats', [StatsController::class, 'showStats'])->name('stats');
    Route::put('/annonces/{annonce}/approve', [AnnoncesController::class, 'approve'])->name('annonce.approve');
    Route::get('/aprouvNonAnnonces', [AnnoncesController::class, 'apprveAnnonces'])->name('annonce.NonApprove');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    Route::get('/backArticles', [ArticleController::class, 'index'])->name('articles.index');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
});












Route::get('/forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('/forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::get('/pageAnnonces', [AnnoncesController::class, 'index'])->name('annonces.index');
Route::get('/', [HomeController::class, 'index'])->name('frentOffice.home');

Route::get('/annonces/{annonce}', [AnnoncesController::class, 'show'])->name('annonces.details');





;


Route::get('/search', [searchController::class, 'search'])->name('search');

Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.details');


