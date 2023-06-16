<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\beranda;
use App\Http\Controllers\Admin;
use App\Http\Controllers\loginController;
// use App\Http\Controllers\profilContoller;
use App\Http\Controllers\profilController;
use App\Http\Controllers\PortofolioController;

use Illuminate\Routing\RouteRegistrar;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

//
// Route::get('login',[loginController::class,'index'])->name('login');

Route::controller(loginController::class)->group(function(){

 Route::get('login','index')->name('login');
 Route::post('login/proses','proses');
 Route::get('logout','logout');
});
Route::group(['middleware'=> ['auth']],function(){
    Route::group(['middleware'=>['CekUserLogin:1']],function(){
        Route::resource('beranda',beranda::class);
    });
    Route::group(['middleware'=>['CekUserLogin:2']],function(){
        Route::resource('profil',profil::class);
    });


});
// Route::Controller(myprofilController::class)->group(function(){
//     Route::get('profil','index');
// });
// Route::get('/beranda',function () {
//     return view ('beranda');
// });

Route::get('profil',[profilController::class,'show']);
// Route::post('profil/add',[profilController::class,'add']);
Route::post('profil/create',[profilController::class,'create']);
Route::post('profil/edit/{id}',[profilController::class,'edit']);
Route::post('profil/update/{id}',[profilController::class,'update']);

    Route::get('portofolio',[PortofolioController::class,'show']);
    Route::get('portofolio/add',[PortofolioController::class,'add']);
    Route::post('portofolio/create',[PortofolioController::class,'create']);
Route::post('portofolio/update/{id}',[PortofolioController::class,'update']);
Route::get('portofolio/edit/{id}',[PortofolioController::class,'edit']);
Route::get('portofolio/hapus/{id}',[PortofolioController::class,'hapus']);
Route::post('portofolio/search',[PortofolioController::class,'search']);







