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
// Route::post('/userlogin',[ApiUserController::class,'userlogin']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
// Route::get('/userdetail',[ApiUserController::class,'userInfo'])->name('userInfo');

// Route::post('/userdetail',[ApiUserController::class,'userInfoUpdate'])->name('userInfoUpdate');
// Route::post('/changepassword',[ApiUserController::class,'submitChangePassword'])->name('submitChangePassword');

// Route::get('/categoryVideo/{id}',[ApiUserController::class,'categoryWiseVideo'])->name('categoryWiseVideo');
// Route::get('/videodetails/{id}',[ApiUserController::class,'videoDetails'])->name('videoDetails');
// Route::post('/comments',[ApiUserController::class,'comments'])->name('comments');
// Route::get('/commentsall',[ApiUserController::class,'showComments'])->name('showComments');
// Route::post('/like',[ApiUserController::class,'like'])->name('like');
// Route::post('/dislike',[ApiUserController::class,'dislike'])->name('dislike');
// Route::post('/countlikes',[ApiUserController::class,'countLikes'])->name('countLikes');
// Route::post('/countdislikes',[ApiUserController::class,'countDislikes'])->name('countDislikes');
// Route::post('/removethumbsup',[ApiUserController::class,'removeLike'])->name('removeLike');
// Route::post('/updatecomment',[ApiUserController::class,'updateComment'])->name('updateComment');


