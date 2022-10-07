<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\CommentController;
use App\Http\Controllers\user\LikeController;
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

Route::get('/userdetail',[UserController::class,'userInfo'])->name('userInfo');
Route::post('/userdetail',[UserController::class,'userInfoUpdate'])->name('userInfoUpdate');
Route::get('/changepassword',[UserController::class,'changePassword'])->name('changePassword');
Route::post('/changepassword',[UserController::class,'submitChangePassword'])->name('submitChangePassword');
Route::get('/categoryVideo/{id}',[UserController::class,'categoryWiseVideo'])->name('categoryWiseVideo');
Route::get('/videodetails/{id}',[UserController::class,'videoDetails'])->name('videoDetails');
Route::post('/comments',[CommentController::class,'comments'])->name('comments');
Route::get('/commentsall',[CommentController::class,'showComments'])->name('showComments');
Route::post('/like',[LikeController::class,'like'])->name('like');
Route::post('/dislike',[LikeController::class,'dislike'])->name('dislike');
Route::post('/countlikes',[LikeController::class,'countLikes'])->name('countLikes');
Route::post('/countdislikes',[LikeController::class,'countDislikes'])->name('countDislikes');