<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataWargaController;

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

Route::get('/auth/login',[AuthController::class,'login']);
Route::post('/auth/login',[AuthController::class,'procLogin']);
Route::get('/auth/register',[AuthController::class,'register']);
Route::post('/auth/register',[AuthController::class,'procRegister']);
Route::get('/admin',[AdminController::class,'dashboard'])->name("dashboard");
// Route::prefix('/')->group(function () {
    Route::get('/',[GuestController::class,'index']);
    Route::get('/datawarga',[GuestController::class,'datawarga']);
    Route::get('/test',[TestController::class,'test']);
// });
Route::get('/aktifitas/{id}',[GuestController::class,'detailActivity']);

Route::group(['middleware' => ['web','isLogin']],function () {
    Route::prefix('admin')->group(function(){
        Route::get('/',[AdminController::class,'dashboard'])->name("dashboard");
        Route::get('/send/mail',[AuthController::class,'sendMail']);
        Route::get('/rt/datawarga',[DataWargaController::class,'datawargas']);
        Route::get('/rt/datawarga/{idWarga}',[DataWargaController::class,'datawarga']);
        Route::get('/rt/datawarga/verifikasi/{idWarga}',[AuthController::class,'verifiyUser']);

        Route::get('/aktifitas',[GuestController::class,'activityPage']);
        Route::post('/aktifitas',[GuestController::class,'storeActivity']);
        Route::post('/aktifitas/update',[GuestController::class,'updActivity']);
        
        Route::get('/testimoni',[Guestcontroller::class,'testimoniPage']);
        Route::post('/testimoni',[GuestController::class,'storeTestimoni']);
        Route::post('/testimoni/update',[GuestController::class,'updTestimoni']);
    });
    Route::get('/aktifitas/delete/{id}',[GuestController::class,'delActivity']);
    Route::get('/aktifitas/detail/{id}',[GuestController::class,'jsonDetailActivity']);
    Route::get('/testimoni/detail/{id}',[GuestController::class,'jsonDetailTestimoni']);
    Route::get('/testimoni/delete/{id}',[GuestController::class,'delTestimoni']);
    Route::get('/user/delete/{id}',[AuthController::class,'delUser']);
    Route::get('/logout',[AuthController::class,'logout']);
    Route::post('/auth/profile/update',[AuthController::class,'updateProfile']);
    Route::get('/profile',[DataWargaController::class,'profile']);
});
Route::get('/email/verified',[AuthController::class,'verifiedEmail'])->name("verifiedEmail");
