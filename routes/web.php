<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessUnitController;
use App\Http\Controllers\DigitalProductController;
use App\Http\Controllers\ImportBuController;
use App\Http\Controllers\ImportDigitalProductController;
use App\Http\Controllers\ImportDormantController;
use App\Http\Controllers\ImportSegmentController;


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
// Logged-in users - with "auth" middleware
Route::prefix("")->group(function () {


Route::resource('business', BusinessUnitController::class);
Route::resource('digital', DigitalProductController::class);

Route::get('business', [App\Http\Controllers\BusinessUnitController::class, 'index'])->name('business.index');
Route::get('segment', [App\Http\Controllers\ImportSegmentController::class, 'index']);
Route::get('dormant', [App\Http\Controllers\ImportDormantController::class, 'index']);
Route::post('delete-business', [App\Http\Controllers\BusinessUnitController::class,'destroy']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/import_bu', [App\Http\Controllers\ImportBuController::class, 'index'])->name('business_units.index');
Route::post('/import_bu/import', [App\Http\Controllers\ImportBuController::class, 'store']);


Route::get('/import_dp', [App\Http\Controllers\ImportDigitalProductController::class, 'index'])->name('digital_product.index');
Route::post('/import_dp/import', [App\Http\Controllers\ImportDigitalProductController::class, 'store']);

Route::get('/import_do', [App\Http\Controllers\ImportDormantController::class, 'index'])->name('dormant.index');
Route::post('/import_do/import', [App\Http\Controllers\ImportDormantController::class, 'store']);

Route::get('/import_seg', [App\Http\Controllers\ImportSegmentController::class, 'index'])->name('seg.index');
Route::post('/import_seg/import', [App\Http\Controllers\ImportSegmentController::class, 'store']);

});