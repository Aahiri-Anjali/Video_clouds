<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\CommentController;
use App\Http\Controllers\user\LikeController;
use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\LaravelformController;
use App\Http\Controllers\GoogleController;
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
Route::post('/removethumbsup',[LikeController::class,'removeLike'])->name('removeLike');
Route::post('/updatecomment',[CommentController::class,'updateComment'])->name('updateComment');

//import and export
Route::get('/importexcel',[ImportExcelController::class,'importexcelShow'])->name('importexcelShow');
Route::post('/importexcel',[ImportExcelController::class,'importexcel'])->name('importexcel');
Route::get('/displayexcel',[ImportExcelController::class,'displayexcel'])->name('displayexcel');
Route::get('/export',[ImportExcelController::class,'export'])->name('export');

//query
Route::get('/query',[UserController::class,'query']);

//laravel form
Route::get('/laravelform',[LaravelformController::class,'laravelformShow'])->name('laravelform.show');
Route::post('/laravelform',[LaravelformController::class,'laravelformSubmit'])->name('laravelform.submit');

//laravel mix(webpack.mix)
// Route::get('/laravelmix',function(){
//     return view('laravelmix');
// });

Route::view('/laravelmix','laravelmix');

// Socilalite routes of google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleController::class, 'callbackFromGoogle']);
