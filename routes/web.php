<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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
Route::get('/auth/login',[AuthController::class,'login']);
Route::post('/auth/login',[AuthController::class,'procLogin']);
Route::get('/auth/register',[AuthController::class,'register']);
Route::post('/auth/register',[AuthController::class,'procRegister']);
Route::get('/admin',[AdminController::class,'dashboard'])->name("dashboard");
// Route::prefix('/')->group(function () {
    Route::get('/',[GuestController::class,'index']);
    Route::get('/test',[TestController::class,'test']);
// });

Route::group(['middleware' => ['web','isLogin']],function () {
    Route::prefix('admin')->group(function(){
        Route::get('/',[AdminController::class,'dashboard'])->name("dashboard");
        Route::get('/logout',[AuthController::class,'logout']);
        Route::get('/send/mail',[AuthController::class,'sendMail']);
    });
});
Route::get('/email/verified',[AuthController::class,'verifiedEmail'])->name("verifiedEmail");
