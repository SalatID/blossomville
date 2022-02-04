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
Route::get('/products',[GuestController::class,'products']);
Route::get('/toko/detail/{id}',[GuestController::class,'guestProductPage']);
Route::get('/news/detail/{id}',[GuestController::class,'newsDetail']);
Route::get('/product/search',[GuestController::class,'products']);

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

        Route::get('/usaha',[Guestcontroller::class,'storePage']);
        Route::post('/usaha',[GuestController::class,'storeStore']);
        Route::post('/usaha/update',[GuestController::class,'updStore']);
        
        Route::get('/usaha/produk/{id}',[GuestController::class,'productPage']);
        Route::post('/produk',[GuestController::class,'storeProduct']);
        Route::post('/produk/update',[GuestController::class,'updProduct']);

        Route::get('/sitesetting',[AdminController::class,'sitesetting']);
        Route::post('/sitesetting',[AdminController::class,'storeSetting']);

        Route::get('/berita',[GuestController::class,'newsPage']);
        Route::post('/berita',[GuestController::class,'storeNews']);
        Route::post('/berita/update',[GuestController::class,'updNews']);

        Route::get('/surat/daftar',[AdminController::class,'letterSubmision']);
        Route::post('/ajukansurat',[AdminController::class,'addLetterSubmision']);
    });
    Route::get('/aktifitas/delete/{id}',[GuestController::class,'delActivity']);
    Route::get('/aktifitas/detail/{id}',[GuestController::class,'jsonDetailActivity']);
    Route::get('/testimoni/detail/{id}',[GuestController::class,'jsonDetailTestimoni']);
    Route::get('/testimoni/delete/{id}',[GuestController::class,'delTestimoni']);
    Route::get('/usaha/detail/{id}',[GuestController::class,'jsonDetailToko']);
    Route::get('/usaha/delete/{id}',[GuestController::class,'delToko']);
    Route::get('/produk/detail/{id}',[GuestController::class,'jsonDetailProduct']);
    Route::get('/produk/delete/{id}',[GuestController::class,'delProduct']);
    Route::get('/berita/detail/{id}',[GuestController::class,'jsonDetailNews']);
    Route::get('/berita/delete/{id}',[GuestController::class,'delNews']);
    Route::get('/user/delete/{id}',[AuthController::class,'delUser']);
    Route::get('/user/update/status/{id}/{level}',[AuthController::class,'updSts']);
    Route::get('/logout',[AuthController::class,'logout']);
    Route::post('/auth/profile/update',[AuthController::class,'updateProfile']);
    Route::get('/profile',[DataWargaController::class,'profile']);
    Route::get('/surat/print/{id_surat}/{id_sumbision}',[AdminController::class,'printLetter']);
    Route::post('/banner/add',[GuestController::class,'addBanner']);
    Route::get('/banner/delete/{id}',[GuestController::class,'deleteBanner']);
    Route::get('/chart/summary/gender',[AdminController::class,'getChartByGender']);
    Route::get('/chart/summary/generation',[AdminController::class,'getChartByGeneration']);
    Route::get('/chart/summary/marriage',[AdminController::class,'getChartByMarriage']);
    Route::get('/chart/summary/resident/gender',[AdminController::class,'getTotalWargaByGender']);
});
Route::get('/email/verified',[AuthController::class,'verifiedEmail'])->name("verifiedEmail");
