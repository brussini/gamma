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
    return redirect(route('home'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/import_bu', [App\Http\Controllers\ImportBuController::class, 'index'])->name('business_units.index');
Route::post('/import_bu/import', [App\Http\Controllers\ImportBuController::class, 'store']);


Route::get('/import_dp', [App\Http\Controllers\ImportDigitalProductController::class, 'index'])->name('digital_product.index');
Route::post('/import_dp/import', [App\Http\Controllers\ImportDigitalProductController::class, 'store']);

Route::get('/import_do', [App\Http\Controllers\ImportDormantController::class, 'index'])->name('dormant.index');
Route::post('/import_do/import', [App\Http\Controllers\ImportDormantController::class, 'store']);