<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home/export', [App\Http\Controllers\HomeController::class, 'export']);
Route::redirect('/here', '/there');
Route::post('/sezon/yukla',[\App\Http\Controllers\SekonController::class,'import']);
Route::post('/skauting/yukla',[\App\Http\Controllers\SekonController::class,'import_skauting']);
Route::get('/tekshir',[\App\Http\Controllers\SkautingController::class,'Hisobot']);
Route::get('/clear',[\App\Http\Controllers\SkautingController::class,'clear'])->name('clear');
