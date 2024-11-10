<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\forgotpasswordController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\socilateController;
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
Route::get('/',[homeController::class,'index'])->name('index');
Route::get('/categories/{category}',[homeController::class,'articlesByCategory'])->name('articles.category');
Route::get('/tags/{tag}',[homeController::class,'articlesBytag'])->name('articles.tag');
Route::get('/article/{article}',[homeController::class,'show'])->name('article');
Route::post( '/like-article/{id}' ,[homeController::class, 'likeArticle' ])->name( 'like.Article' );
Route::post( '/unlike-article/{id}' ,[homeController::class, 'unlikeArticle' ])->name( 'unlike.Article' );

Route::get('/register',[AuthController::class,'showregister'])->name('register');
Route::post('/register',[AuthController::class,'validateregister']);
Route::get('/login',[AuthController::class,'showlogin'])->name('login');
Route::post('/login',[AuthController::class,'validateLogin']);
// La redirection vers le provider
Route::get("redirect/{provider}", [socilateController::class,'redirect'])->name('socilate.redirect');
// Le callback du provider
Route::get("callback/{provider}", [socilateController::class,'callback'])->name('socilate.callback');
Route::get('/dashboard',[dashboardController::class,'index'])->name('dashboard');
Route::post('/dashboard',[dashboardController::class,'passwordModify']);
Route::delete('/deconnexion',[AuthController::class,'logout'])->name('logout');
Route::post('/{article}/comment',[homeController::class,'commentaire'])->name('article.comment');
Route::resource('/Admin/articles',AdminController::class)->except('show')->names('Admin.articles');
Route::get('forget-password', [forgotpasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [forgotpasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [forgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [forgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');	



