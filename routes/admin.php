<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ForgetPasswordController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ImageController;
// use App\Http\Controllers\Admin\VideoController;

Route::group(['namespace' => 'Auth'],function(){
Route::get('/login', 'LoginController@showLoginForm')->name('login');
Route::post('/login', 'LoginController@login');
Route::get('/logout','LoginController@logout')->name('admin_logout');
});

Route::group(['middleware' => 'auth:admin'],function(){
    Route::get('/dashboard',function()
    {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/changepassword',[ChangePasswordController::class,'viewChangepassword'])->name('viewchangepassword');
    Route::post('/changepassword',[ChangePasswordController::class,'changepassword'])->name('changepassword');
    Route::get('/category',[CategoryController::class,'categoryShow'])->name('categoryShow');
    Route::post('/category',[CategoryController::class,'categoryCreate'])->name('categoryCreate');
    Route::get('/categorydata',[CategoryController::class,'categoryData'])->name('categoryData');
    Route::get('/category-edit/{id}',[CategoryController::class,'categoryEdit'])->name('categoryEdit');
    Route::post('/category-update/{id}',[CategoryController::class,'categoryUpdate'])->name('categoryUpdate');
    Route::get('/category-delete/{id}',[CategoryController::class,'categoryDelete'])->name('categoryDelete');
    Route::post('/category-status',[CategoryController::class,'categoryStatus'])->name('categoryStatus');
    Route::resource('video',VideoController::class);
    Route::post('/video/status','VideoController@statusChange')->name('videoStatus');
    Route::post('/video/modal','VideoController@videoModal')->name('videoModal');
    Route::get('/video/trashed/record','VideoController@videoTrashed')->name('videoTrashed');
    Route::get('/video/restore/record/{id}','VideoController@videoRestore')->name('videoRestore');
    Route::get('/video/delete/record/{id}','VideoController@videoDelete')->name('videoDelete');
    Route::get('/video/title/search','VideoController@titleSearch')->name('titleSearch');
    Route::post('/image-icon',[ImageController::class,'imageDelete'])->name('imageDelete');
});

Route::get('/forget',[ForgetPasswordController::class,'forgetshow'])->name('forgetshow');
Route::post('/forget',[ForgetPasswordController::class,'postforget'])->name('postforget');
Route::get('/resetpassword',[ForgetPasswordController::class,'reset_password'])->name('resetpass');
Route::post('/resetpassword',[ForgetPasswordController::class,'reset_validate'])->name('resetvalid');
Route::get('/resendotp',[ForgetPasswordController::class,'resendotp'])->name('resend');
