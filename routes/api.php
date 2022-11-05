<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiUserController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('/api-register',[ApiUserController::class,'register']);
// Route::post('/api-login',[ApiUserController::class,'login']);
// Route::get('/user',[ApiUserController::class,'userDetail']);

// Route::middleware('auth:api')->group(function(){
//    Route::get('/user', [ApiUserController::class,'userDetail']);
// });

//users Route
// Auth::routes();
Route::post('/userlogin',[ApiUserController::class,'userloginApi']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/userdetail',[ApiUserController::class,'userInfoApi'])->name('userInfoApi');

Route::post('/userdetail',[ApiUserController::class,'userInfoUpdateApi'])->name('userInfoUpdateApi');
Route::post('/changepassword',[ApiUserController::class,'submitChangePasswordApi'])->name('submitChangePasswordApi');

Route::get('/categoryVideo/{id}',[ApiUserController::class,'categoryWiseVideoApi'])->name('categoryWiseVideoApi');
Route::get('/videodetails/{id}',[ApiUserController::class,'videoDetailsApi'])->name('videoDetailsApi');
Route::post('/comments',[ApiUserController::class,'commentsApi'])->name('commentsApi');
Route::get('/commentsall',[ApiUserController::class,'showCommentsApi'])->name('showCommentsApi');
Route::post('/like',[ApiUserController::class,'likeApi'])->name('likeApi');
Route::post('/dislike',[ApiUserController::class,'dislikeApi'])->name('dislikeApi');
Route::post('/countlikes',[ApiUserController::class,'countLikesApi'])->name('countLikesApi');
Route::post('/countdislikes',[ApiUserController::class,'countDislikesApi'])->name('countDislikesApi');
Route::post('/removethumbsup',[ApiUserController::class,'removeLikeApi'])->name('removeLikeApi');
Route::post('/updatecomment',[ApiUserController::class,'updateCommentApi'])->name('updateCommentApi');


